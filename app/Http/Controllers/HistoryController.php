<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\HistoryDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nexmo\Client\Exception\Exception;

class HistoryController extends Controller
{
    //
    public function pay()
    {

        if (session()->has('product')) {
            $product = session()->get('product');
            $data = [
                'products' => $product,
                'title' => 'Pay'
            ];
            return view('pay', $data);
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $idHistory = History::withTrashed()->count() + 1;
        $user = User::findOrFail(Auth::id());
        $history = new History();
        $history->fill([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'location' => $request->location,
            'phone' => $request->phone,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);
        if ($request->type == History::CASH) {
            $history->fill([
                'status' => History::SUCCESS,
            ]);
        } else {
            if (auth()->user()->balance >= $request->amount) {
                $balance = auth()->user()->balance - $request->amount;
                $user->balance = $balance;
                $history->fill([
                    'status' => History::SUCCESS,
                ]);
            } else {
                $history->fill([
                    'status' => History::PENDING,
                ]);
            }
        }
        $user->order = $user->order + 1;
        $user->save();
        $history->save();
        if (session()->has('product')) {
            DB::beginTransaction();
            try {
                $data = session()->get('product');
                foreach ($data as $key => $value) {
                    $historyDetail = new HistoryDetail();
                    $historyDetail->fill([
                        'history_id' => $idHistory,
                        'product_id' => $value['id'],
                        'quantity' => $value['quantity'],
                        'name' => $value['name'],
                        'cost' => $value['cost'],
                    ]);
                    $historyDetail->save();
                }
                DB::commit();
                session()->forget('product');
                return redirect()->route('home');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back();
            }
        }
    }
}

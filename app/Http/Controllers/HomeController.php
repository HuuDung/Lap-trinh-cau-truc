<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(12);
        $categories = Category::all();
        $cart = 0;
        if(session()->has('product'))
        {
            $data = session()->get('product');
            foreach ($data as $key => $value)
            {
                $cart += $value['quantity'];
            }
        }
        $data = [
            'products' => $products,
            'categories' => $categories,
            'title' => "Home",
            'cart' => $cart,
        ];
        return view('home', $data);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $cart = 0;
        if(session()->has('product'))
        {
            $data = session()->get('product');
            foreach ($data as $key => $value)
            {
                $cart += $value['quantity'];
            }
        }
        if ($request->category != null) {
            $products = Product::where('category_id', $request->category)
                ->where('name', 'like', '%' . $request->content . '%')
                ->paginate(12);
        } else {
            $products = Product::where('name', 'like', '%' . $request->content . '%')
                ->paginate(12);
        }
        if ($products->count() == 0) {
            $data = [
                'products' => $products,
                'status' => false,
                'title' => "Result",
                'categories' => $categories,
                'cart' => $cart,
            ];
        } else {
            $data = [
                'products' => $products,
                'status' => true,
                'title' => "Result",
                'categories' => $categories,
                'cart' => $cart,
            ];
        }
        return view('home', $data);
    }
}

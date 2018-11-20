<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Product;
use Illuminate\Http\Request;

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
        $products = Product::paginate(5);
        $categories =Category::all();
        $data =[
            'products'=>$products,
            'categories' => $categories,
            'title' => "Home",
        ];
        return view('home', $data);
    }
    public function search(Request $request)
    {
        $categories =Category::all();
        if ($request->has('category')) {
            $products = Product::where('category_id', $request->category)
                ->where('name', 'like', '%' . $request->content . '%')
                ->paginate(5);
        } else {
            $products = Product::where('name', 'like', '%' . $request->content . '%')
                ->paginate(5);
        }
        if ($products->count() == 0) {
            $data = [
                'products' => $products,
                'status' => false,
                'title' => "Result",
                'categories' => $categories,
            ];
        } else {
            $data = [
                'products' => $products,
                'status' => true,
                'title' => "Result",
                'categories' => $categories,
            ];
        }
        return view('home',$data);
    }
}

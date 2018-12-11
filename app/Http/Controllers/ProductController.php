<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    //
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $cart = 0;
        if (session()->has('product')) {
            $data = session()->get('product');
            foreach ($data as $key => $value) {
                $cart += $value['quantity'];
            }
        }
        $data = [
            'product' => $product,
            'title' => 'Product Detail',
            'cart' => $cart,
        ];
        if (auth()->id() != null) {
            return view('product.show', $data);
        } else {
            return view('product.unauth-show', $data);
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: sondoan
 * Date: 19/11/2018
 * Time: 21:27
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Product;

class ProductAdministrationController extends Controller
{
    public function listProduct()
    {
        $product = Product::paginate(5);
        $data = [
            'products' => $product,
            'title' => "Product Administration"
        ];
        return view('admin.product-administration.index', $data);
    }
}
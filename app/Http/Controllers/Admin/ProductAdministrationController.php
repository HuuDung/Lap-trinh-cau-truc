<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ProductAdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $data = [
            'title' => "Create Product",
            'categories' => $categories,
        ];
        return view('admin.product-administration.product-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = Product::withTrashed()->count() + 1;
        $product = new Product();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Image::make($image)->resize(150, 150)->save(public_path('/storage/product/' . $id . '.' .
                $image->getClientOriginalExtension()));
            $imageUrl = 'storage/product/' . $id . '.' . $image->getClientOriginalExtension();
            $product->fill([
               'image' => $imageUrl,
            ]);
        }
        $product->fill([
            'name' => $request->name,
            'cost' => $request->cost,
            'category_id' => $request->category,
            'description' => $request->description,
        ]);
        $product->save();
        dd(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

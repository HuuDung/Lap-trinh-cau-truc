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
        $product = Product::paginate(5);
        $data = [

           'products' => $product,
           'title' => "Product Administration"
        ];
        return view('admin.product-administration.index', $data);
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
        dd($id);
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
        return redirect()->route('admin.product-administration.index');
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
        $product = Product::findOrFail($id);
        $data=[
          'title' => "Show product",
          'product' => $product
        ];
        return view('admin.product-administration.show', $data);
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
        dd(0);
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
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product-administration.index');
    }
}

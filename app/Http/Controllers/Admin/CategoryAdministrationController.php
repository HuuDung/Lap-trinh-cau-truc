<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryAdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::paginate(5);
        $data = [
            'title' => 'Categories',
            'categories' => $category,
        ];
        return view('admin.category-administration.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'title' => "Create Category",
        ];
        return view('admin.category-administration.create', $data);
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
        $category= new Category();
        $category->fill([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $category->save();
        return redirect()->route('admin.category.show', $category->id);

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
        $category = Category::findOrFail($id);
        $data = [
            'title' => "Show Category",
            'category' => $category,
        ];
        return view('admin.category-administration.show', $data);
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
        $category = Category::findOrFail($id);
        $data = [
            'title' => "Edit Category",
            'category' => $category,
        ];
        return view('admin.category-administration.edit', $data);
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
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $category->save();
        return redirect()->route('admin.category.show', $category->id);
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
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}

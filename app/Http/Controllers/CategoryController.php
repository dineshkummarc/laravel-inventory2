<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories,name|max:255'
            ]);

            Category::create($request->all());

            return redirect()->route('category.index')->with('success', 'Satu Data Berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('category.create')->withInput()->with('errors', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories,name|max:255',
            ]);

            $category->update($request->all());

            return redirect()->route('category.index')->with('success','Satu Data berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->route('category.edit', $category->id)->withInput()->with('errors',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()->route('category.index')->with('success','Satu Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('errors',$e->getMessage());
        }
    }
}

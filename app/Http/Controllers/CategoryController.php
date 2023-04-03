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
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request, Category $category)
    {
        $request->validate([
            'name' =>'string|required',
        ]);

        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {   
        $categories = Category::all();
        return view('category.show', compact('category', 'categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'string|required',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->update();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->blogs()->delete();
        $category->delete();
        return redirect()->back();
    }
}

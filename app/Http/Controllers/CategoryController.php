<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan category baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Category created successfully!');
    }

    // Menampilkan detail category
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Menampilkan form edit
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully!');
    }
}
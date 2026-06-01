<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('category.index', [
            'title' => 'Category',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create', [
            'title' => 'Create Category'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'code' => 'required|max:255',
        ]);

        Category::create($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category berhasil ditambahkan!');
    }
    public function edit(Category $category)
{
    return view('category.edit', [
        'title' => 'Edit Category',
        'category' => $category
    ]);
}

public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'code' => 'required|max:255',
    ], [
        'name.required' => 'Nama category wajib diisi',
        'description.required' => 'Deskripsi wajib diisi',
        'code.required' => 'Code wajib diisi',
    ]);

    $category->update($validated);

    return redirect()
        ->route('category.index')
        ->with('success', 'Data category berhasil diubah');
}
}
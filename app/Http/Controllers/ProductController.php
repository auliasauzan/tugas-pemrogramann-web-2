<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category_id;

        $products = Product::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('brand', 'like', "%{$search}%");
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->paginate(10);

        return view('product.index', [
            'title' => 'Product',
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }

    public function create()
{
    return view('product.create', [
        'title' => 'Create Product',
        'categories' => Category::all(),
    ]);
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'brand' => 'required|max:255',
        'type' => 'required|max:255',
        'skin_type' => 'required|max:255',
        'expired_date' => 'required|date',
        'category_id' => 'required|exists:categories,id',
    ]);

    Product::create($validated);

    return redirect()
        ->route('product.index')
        ->with('success', 'Product berhasil ditambahkan!');
}


public function edit(Product $product)
{
    return view('product.edit', [
        'title' => 'Edit Product',
        'product' => $product,
        'categories' => Category::all(),
    ]);
}

public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'brand' => 'required|max:255',
        'type' => 'required|max:255',
        'skin_type' => 'required|max:255',
        'expired_date' => 'required|date',
        'category_id' => 'required',
    ]);

    $product->update($validated);

    return redirect()
        ->route('product.index')
        ->with('success', 'Data Product berhasil diubah');
}
}
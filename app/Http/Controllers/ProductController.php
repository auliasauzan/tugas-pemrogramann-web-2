<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $products = Product::with('category');

    // Search nama atau brand
    if ($request->search) {
        $products->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%');
        });
    }

    // Filter category
    if ($request->category_id) {
        $products->where('category_id', $request->category_id);
    }

    return view('product.index', [
        'title' => 'Product',
        'products' => $products->paginate(5)->withQueryString(),
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
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Data Product berhasil diubah');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Data Product berhasil dihapus');
    }

    public function show(Product $product)
    {
        return view('product.show', [
            'title' => 'Detail Product',
            'product' => $product
        ]);
    }
}
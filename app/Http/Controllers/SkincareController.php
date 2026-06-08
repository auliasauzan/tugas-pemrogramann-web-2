<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skincare;
use Illuminate\Http\Request;


class SkincareController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $category = $request->category_id;

    $skincares = Skincare::with('category')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('brand', 'like', '%' . $search . '%')
                  ->orWhere('type', 'like', '%' . $search . '%');
        })
        ->when($category, function ($query) use ($category) {
            $query->where('category_id', $category);
        })
        ->latest()
        ->paginate(100);

    return view('skincare.index', [
        'title' => 'Skincare',
        'skincares' => $skincares,
        'categories' => Category::all(),
    ]);
}

public function create()
{
    return view('skincare.create', [
        'title' => 'Create Skincare',
        'categories' => Category::all(),
    ]);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand' => 'required|max:255',
        'type' => 'required|max:255',
        'skin_type' => 'required|max:255',
        'expired_date' => 'required|date',
    ], [
        'name.required' => 'Nama skincare tidak boleh kosong',
        'name.max' => 'Nama skincare maksimal 255 karakter',

        'category_id.required' => 'Kategori tidak boleh kosong',
        'category_id.exists' => 'Kategori tidak ditemukan',

        'brand.required' => 'Brand tidak boleh kosong',
        'brand.max' => 'Brand maksimal 255 karakter','type.required' => 'Tipe skincare tidak boleh kosong',
        'type.max' => 'Tipe skincare maksimal 255 karakter',

        'skin_type.required' => 'Jenis kulit tidak boleh kosong',
        'skin_type.max' => 'Jenis kulit maksimal 255 karakter',

        'expired_date.required' => 'Tanggal expired tidak boleh kosong',
        'expired_date.date' => 'Format tanggal tidak valid',
    ]);

        Skincare::create($validated);

    return redirect()
        ->route('skincare.index')
        ->with('success', 'Data skincare berhasil ditambahkan!');
}
   public function edit(Skincare $skincare)
{
    return view('skincare.edit', [
        'title' => 'Edit Data Skincare',
        'skincare' => $skincare,
        'categories' => Category::all(),
    ]);
}

    public function update(Request $request, Skincare $skincare)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand' => 'required|max:255',
        'type' => 'required|max:255',
        'skin_type' => 'required|max:255',
        'expired_date' => 'required|date',
    ]);

    $skincare->update($validated);

    return redirect()
        ->route('skincare.index')
        ->with('success', 'Data skincare berhasil diubah!');
}

public function destroy(Skincare $skincare)
{
    $skincare->delete();

    return redirect()
        ->route('skincare.index')
        ->with('success', 'Data skincare berhasil dihapus');
}

}
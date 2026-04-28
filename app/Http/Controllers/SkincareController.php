<?php

namespace App\Http\Controllers;

use App\Models\Skincare;
use Illuminate\Http\Request;

class SkincareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      

return view('skincare.index', [
    'title'    => 'Skincare',
    'skincares' => Skincare::all(),
]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('Skincare.create', ['title' => 'Create Skincare']);
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'name'         => 'required|max:255',
        'brand'        => 'required|max:255',
        'type'         => 'required',
        'skin_type'    => 'required',
        'expired_date' => 'required|date',
    ], [
        // Pesan error custom sesuai keinginan Anda
        'name.required'         => 'Nama produk tidak boleh kosong',
        'name.max'              => 'Nama tidak boleh lebih dari 255 karakter',
        'brand.required'        => 'Brand tidak boleh kosong',
        'type.required'         => 'Silakan pilih jenis produk',
        'skin_type.required'    => 'Silakan pilih jenis kulit',
        'expired_date.required' => 'Tanggal kadaluarsa wajib diisi',
        'expired_date.date'     => 'Format tanggal tidak valid',
    ]);

    // Berikan nilai default untuk deskripsi karena di database bersifat NOT NULL
    $validated['description'] = '-';

    \App\Models\Skincare::create($validated);

    return redirect('/skincare')->with('success', 'Produk berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
    public function show(Skincare $skincare)
    {
        return view('skincare.show', [
        'title'    => 'Detail Skincare',
        'skincare' => $skincare
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skincare $skincare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skincare $skincare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skincare $skincare)
    {
        //
    }

}
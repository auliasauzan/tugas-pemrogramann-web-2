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
}
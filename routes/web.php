<?php

use App\Http\Controllers\SkincareController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [SkincareController::class, 'index']);

Route::get('/skincare', [SkincareController::class, 'index'])->name('skincare.index');
Route::get('/skincare/create', [SkincareController::class, 'create'])->name('skincare.create');
Route::post('/skincare/store', [SkincareController::class, 'store'])->name('skincare.store');
// Menampilkan form edit
Route::get('/skincare/{skincare}/edit', [SkincareController::class, 'edit'])->name('skincare.edit');

// Memproses update data
Route::put('/skincare/{skincare}', [SkincareController::class, 'update'])->name('skincare.update');

Route::delete('/skincare/{skincare}', [SkincareController::class, 'destroy'])->name('skincare.destroy');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])
    ->name('category.create');

Route::post('/category/store', [CategoryController::class, 'store'])
    ->name('category.store');
<?php

use App\Http\Controllers\SkincareController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    Route::get('/category/{category}/edit',
    [CategoryController::class, 'edit']
)->name('category.edit');

Route::put('/category/{category}',
    [CategoryController::class, 'update']
)->name('category.update');
Route::delete('/category/{category}',
    [CategoryController::class, 'destroy']
)->name('category.destroy');
Route::get('/category/{category}',
    [CategoryController::class, 'show']
)->name('category.show');
Route::get('/skincare', [SkincareController::class, 'index'])
    ->name('skincare.index');

    Route::get('/product', [ProductController::class, 'index'])
    ->name('product.index');
   
    Route::get('/product/create', [ProductController::class, 'create'])
    ->name('product.create');


Route::post('/product/store', [ProductController::class, 'store'])
    ->name('product.store');

    Route::get('/product/{product}/edit',
    [ProductController::class, 'edit']
)->name('product.edit');

Route::put('/product/{product}',
    [ProductController::class, 'update']
)->name('product.update');

Route::delete('/product/{product}',
    [ProductController::class, 'destroy']
)->name('product.destroy');

Route::get('/product/{product}', [ProductController::class, 'show'])
    ->name('product.show');

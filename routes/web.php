<?php

use App\Http\Controllers\SkincareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [SkincareController::class, 'index']);

Route::get('/skincare', [SkincareController::class, 'index'])->name('skincare.index');
Route::get('/skincare/create', [SkincareController::class, 'create'])->name('skincare.create');
Route::post('/skincare/store', [SkincareController::class, 'store'])->name('skincare.store');



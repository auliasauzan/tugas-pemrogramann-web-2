<?php

use App\Http\Controllers\SkincareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Skincare', [skincareController::class, 'index']);
Route::get('/Skincare/create', [SkincareController::class, 'create']);



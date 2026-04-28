<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Skincare', function () {
    return view('Skincare.index', ['title' => 'Skincare']);
});

Route::get('/Skincare/create', function () {
    return view('Skincare.create', ['title' => 'Create Skincare']);
});
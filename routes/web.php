<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/data', [ProductController::class, 'getData'])->name('products.data');

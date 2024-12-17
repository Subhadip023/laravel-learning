<?php

use App\Http\Controllers\ImagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route :: resource('images',ImagesController::class);
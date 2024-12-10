<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('user',UserController::class);
Route::get('/login',[UserController::class, 'login']);
Route::get('/register',[UserController::class, 'register']);

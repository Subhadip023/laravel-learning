<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/register',[UserController::class, 'save']);
Route::get('/register',function(){
    return view('register.index');
});

Route::get('/login',function(){
    return view('login.index');
})->name('login');

Route::post('/login',[AuthController::class,'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


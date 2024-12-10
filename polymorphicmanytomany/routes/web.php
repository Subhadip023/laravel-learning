<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Video;


Route::resource('/posts','PostController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

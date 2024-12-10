<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/name', [MyController::class,'name']);
Route::get('/user/{id}', [MyController::class,'id']);
Route::resource('user', MyController::class);

Route::get('/insert',function () {
    DB::insert('insert into new(name,column1) values(?,?)',['dip ','this is for column one ']);
});

Route::get('/read/{id}',function ($id) {
    $result=DB::select('select * from new where id = ?',[$id]);

    foreach ($result as $row) {
        return $row -> name;
    }
});
Route::get('/update',function () {
    $update = DB::update('update new set name = "Update name " where id=?',[1]);
    return $update;
});

Route::get('/delete',function () {
    $delete = DB::delete('delete from new where id=?',[1]);
    return $delete;
});
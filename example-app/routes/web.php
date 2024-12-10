<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about.index',["name"=>"Subhadip"]);
});

Route::get('/teas', function () {
    $teas = [
        ["name" => "Masala Chai", "Price" => 100, "id" => 1],
        ["name" => "Green Tea", "Price" => 120, "id" => 2],
        ["name" => "Earl Grey", "Price" => 150, "id" => 3],
        ["name" => "Chamomile", "Price" => 130, "id" => 4],
        ["name" => "Peppermint Tea", "Price" => 110, "id" => 5],
        ["name" => "Lemon Ginger Tea", "Price" => 140, "id" => 6],
        ["name" => "Oolong Tea", "Price" => 160, "id" => 7],
        ["name" => "Jasmine Tea", "Price" => 170, "id" => 8],
        ["name" => "Darjeeling Tea", "Price" => 180, "id" => 9],
        ["name" => "Matcha", "Price" => 200, "id" => 10],
        ["name" => "Hibiscus Tea", "Price" => 130, "id" => 11],
        ["name" => "Black Tea", "Price" => 90, "id" => 12],
        ["name" => "White Tea", "Price" => 220, "id" => 13],
        ["name" => "English Breakfast", "Price" => 160, "id" => 14],
        ["name" => "Rooibos Tea", "Price" => 140, "id" => 15],
    ];
    
    return view("tea.index",['teas'=>$teas]);
});

Route::get('/teas/{id}', function ($id) {
    $teas = [
        ["name" => "Masala Chai", "Price" => 100, "id" => 1],
        ["name" => "Green Tea", "Price" => 120, "id" => 2],
        ["name" => "Earl Grey", "Price" => 150, "id" => 3],
        ["name" => "Chamomile", "Price" => 130, "id" => 4],
        ["name" => "Peppermint Tea", "Price" => 110, "id" => 5],
        ["name" => "Lemon Ginger Tea", "Price" => 140, "id" => 6],
        ["name" => "Oolong Tea", "Price" => 160, "id" => 7],
        ["name" => "Jasmine Tea", "Price" => 170, "id" => 8],
        ["name" => "Darjeeling Tea", "Price" => 180, "id" => 9],
        ["name" => "Matcha", "Price" => 200, "id" => 10],
        ["name" => "Hibiscus Tea", "Price" => 130, "id" => 11],
        ["name" => "Black Tea", "Price" => 90, "id" => 12],
        ["name" => "White Tea", "Price" => 220, "id" => 13],
        ["name" => "English Breakfast", "Price" => 160, "id" => 14],
        ["name" => "Rooibos Tea", "Price" => 140, "id" => 15],
    ];

return view('tea.teadetails',['tea'=>$teas[$id-1]]);

});
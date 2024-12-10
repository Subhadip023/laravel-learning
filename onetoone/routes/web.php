<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    $user = User::findOrFail(1);
    $address = new Address(['name' => '216, Canal S Rd, Metropolitan Co-Operative Housing Society Limited, Tangra, Kolkata, West Bengal 700105']);
    $user->address()->save($address);
    return "Address inserted successfully!";
});

Route::get('/update', function () {
    $address = Address::whereUserId(1)->first();
    if ($address) {
        $address->name = 'Updated address';
        $address->save();
        return "Address updated successfully!";
    } else {
        return "Address not found for the user.";
    }
});
Route::get('/read', function () {
    $user = User::findOrFail(1); // Change to User::findOrFail(1) if you want to test with user ID 1

    // Check if the user has an associated address
    if ($user->address) {
        return $user->address->name;
    } else {
        return "No address found for this user.";
    }
});

Route::get('/delete', function () {
    $user = User::findOrFail(1); // Change to User::findOrFail(1) if you want to test with user ID 1

    // Check if the user has an associated address before deleting
    if ($user->address) {
        $user->address()->delete();
        return "Address deleted successfully!";
    } else {
        return "No address to delete for this user.";
    }
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return "This is index";
    }

    public function create()
    {
        return"this is create function ";
    }

    public function store(Request $request)
    {
       return "this is store";
    }

    public function show($id)
    {
        // Display a single user by ID
        return "User id is: {$id}";
    }

    public function edit($id)
    {
        return "This is edit and id is {$id}";
    }

    public function update(Request $request, $id)
    {
        return "This is Update";
    }

    public function destroy($id)
    {
        return "this is destry and id is {$id}";
    }

    // You can keep your existing methods if needed
    public function name()
    {
        return "My name is Subhadip";
    }

    public function id($id)
    {
        return "User id is: {$id}";
    }
}

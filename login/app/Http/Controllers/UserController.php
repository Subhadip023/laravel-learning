<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function save(Request $request){
       $validateData= $request->validate(
            [
                'name'=>'required | string | min:3 | max : 255',
                'email'=>'required | email |unique:users',
                'password'=>'required | string | min : 8 '
            ]
            );
 User::create(
    [
        
        'name'=>$validateData['name'],
        'email'=>$validateData['email'],
        'password'=>Hash::make($validateData['password']),


]);


return redirect('/')->with('success', $validateData['name'].' registered successfully!');           
    }
}

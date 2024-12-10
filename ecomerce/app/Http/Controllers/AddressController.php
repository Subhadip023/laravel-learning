<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('user.add-address',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $vailData=$request->validated();
        $user_id=auth()->user()->id;
        if(Address::where('user_id',$user_id)){
           $address=Address::where('user_id',$user_id);
            $address->delete();
        }
        Address::create([
            'user_id'=>$user_id,
            'street'=>$vailData['street'],
            'city'=>$vailData['city'],
            'state'=>$vailData['state'],
            'country'=>$vailData['country'],
            'postal_code'=>$vailData['postal_code'],
            
            ]

        );
        return redirect('/')->with('success',"Address saved!");
    }

// this is for store address by admin for a user 

public function store_for_user(StoreAddressRequest $request)
{
    $vailData=$request->validated();
    $user_id=$request['user_id'];
    if(Address::where('user_id',$user_id)){
       $address=Address::where('user_id',$user_id);
        $address->delete();
    }
    Address::create([
        'user_id'=>$user_id,
        'street'=>$vailData['street'],
        'city'=>$vailData['city'],
        'state'=>$vailData['state'],
        'country'=>$vailData['country'],
        'postal_code'=>$vailData['postal_code'],
        
        ]

    );
    return redirect('/admin/users')->with('success',"Address saved!");
}


    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}

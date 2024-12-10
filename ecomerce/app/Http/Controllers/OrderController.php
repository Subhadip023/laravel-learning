<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
// use Request;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class OrderController extends Controller
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
  
public function create(Request $request)
{

    $user = Auth::user();

    // Check if the user has an address
    if (!$user->address()->exists()) {
        // If no address exists, redirect to the 'add address' page
        return redirect()->route('address.create')->with('error', 'Please add an address before placing the order.');
    }


    // Retrieve the product_id from the request
    $productId = $request->query('product_id'); 
    $userId = $request->query('user_id'); 

   
    if (!$productId || !$userId) {
        return redirect()->back()->with('error','Some error happend ');


    }

    $product=Product::find($productId);
    $user=User::find($userId);


    return view('user.create-order',['product'=>$product,'user'=>$user]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {



        $user = Auth::user();

        // Check if the user has an address
        if (!$user->address()->exists()) {
            // If no address exists, redirect to the 'add address' page
            return redirect()->route('address.create')->with('message', 'Please add an address before placing the order.');
        }
        // return $request;
        try{

            $valData=$request->validated();

            $order=Order::create([
                'user_id'=>$valData['user_id'],
                'product_id'=>$valData['product_id'],
                'quantity'=>$valData["quantity"],
                'price'=>$valData['quantity']*$valData['price'],
                'shipping_address_id'=>$valData['address_id'],
                ]
            );
            return redirect('/all-products')->with('success','order created ');
        }catch (ValidationException $e) {
            // Get all validation errors
            $errors = $e->errors();
    
            // Check if the 'address_id' field has any error messages
            if (isset($errors['address_id'])) {
                // Log or handle the specific error for address_id
                \Log::error('Validation failed for address_id:', ['errors' => $errors['address_id']]);
            }
    
            // Optionally handle other errors if needed
            // Example: if other fields failed, you can handle them here as well
    
            // Redirect back with errors if needed
            return redirect()->back()->withErrors($errors)->withInput();
        } // return $valData;
        // $user=User::findOrFail($valData['user_id']);
        // $product=User::findOrFail($valData['product_id']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order-edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return redirect('/admin/orders')->with('success','Order status Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {

            if (auth()->user()->role->name!=='Admin'){
                return;
            }

            $order->delete();
            return redirect()->back()->with('success',"
            Order deleted ");
    }
}

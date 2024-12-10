<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
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
        $categories=Category::all();
    return view('admin.create-product',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        
        $valData=$request->validated();
        $product= Product::create($valData);
        
        // return redirect('/admin/produts ')->with('success','Product created successfully!');
        return redirect("product-image/{$product->id}/create")->with('success', "Product created successfully! Add images for {$product->name}");


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   $categories=Category::all();
        return view('admin.edit-product',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {  // Get the validated data from the request
        $validatedData = $request->validated();
    
        // Check which fields are actually changed
        foreach ($validatedData as $key => $value) {
            if ($product->$key !== $value) {
                // If the field value is different, update it
                $product->$key = $value;
            }
        }
    
        // Save the updated product
        $product->save();
        return redirect('admin/produts')->with('success','Product Edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
      
        foreach ($product->productImage->all() as $product) {

            if ($product->path && \Storage::disk('public')->exists($product->path)) {
                \Storage::disk('public')->delete($product->path);
            }        }

  $product->delete();
        return redirect()->back()->with('success',"{$product->name} was deleted succesfully! ");
    }
}

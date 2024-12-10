<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use DB;
use Log;
use Request;


class ProductImageController extends Controller
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
    public function createById(Product $productId)
    {
        return view('admin.add-product-images', ['product' => $productId]);
    }

    /**
     * Store a newly created resource in storage.
     */


     public function store(StoreProductImageRequest $request)
     {
         // Ensure the product exists
         $product = Product::find($request->input('product_id'));
         if (!$product) {
             return redirect('/admin')->with('error', 'Product not found.');
         }
     
         try {
             // Begin database transaction
             DB::beginTransaction();
     
             // Handle cover image
             if ($request->hasFile('cover_images')) {
                 $coverImage = $request->file('cover_images');
                 $coverPath = $coverImage->store('productImages', 'public');
                 if ($product->productImage && $product->productImage->isNotEmpty() && $product->productImage->first()->type=='cover') {
                     return redirect('/admin/produts')->with('error', "{$product->name} already have a cover image ");
                }


                 ProductImage::create([
                     'path' => $coverPath,
                     'type' => 'cover',
                     'product_id' => $product->id,
                 ]);
             }
     
             // Handle additional images
             if ($request->hasFile('images')) {
                 foreach ($request->file('images') as $image) {
                     $path = $image->store('productImages', 'public');
                     ProductImage::create([
                         'path' => $path,
                         'type' => 'normal',
                         'product_id' => $product->id,
                     ]);
                 }
             }
     
             // Commit transaction
             DB::commit();
     
             return redirect('/admin/produts')->with('success', 'Images uploaded successfully.');
         } catch (\Exception $e) {
             // Rollback transaction in case of error
             DB::rollBack();
     
             // Log the error for debugging (optional)
             Log::error('Image upload failed', ['error' => $e->getMessage()]);
     
             return redirect('/admin/products')->with('error', 'An error occurred while uploading images.');
         }
     }
     

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {

        $product = Product::find($productId);

        // return $product->productImage;
        return view('admin.show-product-images',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $productId)
    {   $product=Product::find($productId);
        return view('admin.edit-product-images',['product'=>$product]);
        // return 'edit productimages';
    }

    /**
     * Update the specified resource in storage.
     */
   
     
     public function update(UpdateProductImageRequest $request, ProductImage $product_image)
     {
         // Check if a new image file is uploaded
         if ($request->hasFile('productImage')) {
             $newImage = $request->file('productImage');
     
             // Save the new image in the storage and get the path
             $newImagePath = $newImage->store('productImages', 'public');
     
             // Delete the old image if it exists
             if ($product_image->path && \Storage::disk('public')->exists($product_image->path)) {
                 \Storage::disk('public')->delete($product_image->path);
             }
     
             // Update the product image path in the database
             $product_image->path = $newImagePath;
     
             if ($product_image->save()) {
                 return redirect()->back()->with('success', 'Image updated successfully!');
             } else {
                 return redirect()->back()->with('error', 'Failed to update the image. Please try again.');
             }
         }
     
         // If no file was uploaded
         return redirect()->back()->with('error', 'No image file provided.');
     }
     

     


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {

        if ($productImage->type==='cover') {
            return redirect()->back()->with("error","Can't delete cover image of a post");
        }

        if ($productImage->path && \Storage::disk('public')->exists($productImage->path)) {
            \Storage::disk('public')->delete($productImage->path);
        }


        $productImage->delete();




        return redirect()->back()->with("success","Image deleted succesfully!");
    }
}

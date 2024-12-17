<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateImagesRequest;
use App\Models\Images;
use Illuminate\Http\Request;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

   
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     **/
    
     public function store(Request $request)
    {
        try {
            // Validate the file input
            $request->validate([
                'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // Limit to 2MB for example
            ]);

            // Handle file upload
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the file in the "uploads" directory under "public"
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            // Return a success response
            return response()->json([
                'message' => 'File uploaded successfully!',
                'file_path' => asset('storage/' . $filePath),
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImagesRequest $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $images)
    {
        //
    }
}

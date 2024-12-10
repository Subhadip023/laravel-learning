<x-layout-admin>
    <div class="container">
        <h1 class=" text-3xl text-center mb-2 font-bold ">Upload Images for {{ $product->name }}</h1>
        @foreach ($errors->all() as $error)
            <li span class= "text-red-600 duration-200 list-none">{{ $error }}</li>
        @endforeach
        <!-- Form to upload images -->
        <form id="imageForm" method="POST" action="{{ route('product-image.store') }}" enctype="multipart/form-data"
            class="flex flex-wrap items-center">
            @csrf
            @method('post')

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <!-- Dynamic image input fields -->
            <div
                class="  flex flex-wrap w-full border shadow-lg rounded-lg bg-slate-200  my-5 gap-2 items-center justify-center">

                <div class=" image-inputs image-input-box b flex flex-wrap items-center justify-center">
                    <div class="image-input-box flex">

                        <div class="bg-gray-400 w-[230px] h-[230px] rounded-lg   flex items-center justify-center m-2"
                            id="imagePreview1">

                            <input type="file" name="cover_images" id="image1" accept="image/*" required hidden
                                onchange="previewImage22(this,'imagePreview1','deleteBtn1','uploadBtn1')">

                            {{-- upload btn  --}}
                            <button type="button"
                                class= "flex gap-x-3 items-center rounded-lg text-white bg-green-600 p-2 px-5"
                                id="uploadBtn1" onclick="document.getElementById('image1').click()"><svg
                                    class="text-white scale-150" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                </svg> Upload </button>


                            <button id="deleteBtn1" type="button"
                                onclick="document.getElementById('image1').value = ''; document.getElementById('imagePreview1').style.backgroundImage = '';  document.getElementById('deleteBtn1').style.display='none';document.getElementById('uploadBtn1').style.display='flex';"
                                class="bg-red-500 p-2 text-white  rounded mt-2" style="display: none"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash scale-150" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></button>


                        </div>

                    </div>
                </div>





            </div>
            <div class=" flex items-center justify-center p-5 gap-x-2 w-full">
                <!-- Button to add more image input fields -->
                <button type="button"
                    class="text-green-700 flex gap-x-1 items-center border-2 p-2 px-5 border-green-700 rounded-lg hover:text-green-900
                "
                    id="addImageBtn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg> Add More Images</button>

                <!-- Submit button -->
                <button class="bg-blue-600 p-2 px-5 text-white rounded-lg hover:bg-blue-700"
                    type="submit">Submit</button>
            </div>

        </form>
    </div>


</x-layout-admin>

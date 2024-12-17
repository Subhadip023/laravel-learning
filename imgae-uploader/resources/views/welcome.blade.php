<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/submitImage.js'])
    <style>
        #drop-box {border: 2px dashed #4caf50;background-color: #f9f9f9;}
        .preview-container {display: flex;flex-wrap: wrap;margin-top: 10px;gap: 10px;}
        .image-preview {width: 100px;height: 100px;object-fit: cover;border: 1px solid #ddd;border-radius: 5px;}
    </style>
</head>

<body>

    <h1 class="text-5xl mt-10 text-center font-bold text-green-600">Image Uploader</h1>
    <section class="w-4/5 mt-5 mx-auto min-h-[80vh] flex flex-wrap items-center justify-center flex-col">
        <div id="drop-box" class="w-2/3 h-[300px] rounded-lg flex flex-col items-center justify-center">
            <button id="uploadButton" class="flex hover:text-gray-500 duration-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-cloud-arrow-up mr-3 hover:text-gray-500 scale-150" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z" />
                    <path
                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                </svg>
                <p>Upload Images</p>
            </button>

            <form id='submitForm' action={{route('images.store')}}
            method="post"
        enctype="multipart/form-data"
            >
            @csrf
            </form>

            

        </div>
        <div class="preview-container  w-4/5 flex flex-wrap items-center justify-center gap-x-2 h-30"
            id="preview-container">
        </div>
    </section>

    
</body>

</html>

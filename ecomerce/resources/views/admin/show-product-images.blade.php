<x-layout-admin>
    <div class="container">
        <h1 class=" text-3xl text-center mb-2 font-bold ">View  Images for {{$product->name}}</h1>

      

            <div class="  flex flex-wrap w-full border shadow-lg rounded-lg bg-slate-200  my-5 gap-2 items-center justify-center">
                @foreach ($product->productImage as $productImage)

                <div class=" image-inputs image-input-box b flex flex-wrap items-center justify-center">
                    <div class="image-input-box flex">
                     {{-- {{$productImage}} --}}
                 
                        <div class="bg-gray-400 w-[230px] h-[230px] rounded-lg   flex items-center justify-center m-2" style="background-image: url({{Storage::url($productImage->path)}})                   
                        " >
                            
<img src="{{Storage::url($productImage->path)}}" class="h-full w-full rounded-lg " >
                            
                                              
                           
                        </div>
                      
                    </div>
                </div>

                @endforeach 

                
            </div>
           
<div class="flex items-center justify-center p-5 gap-x-2 w-full">
 <!-- Button to add more image input fields -->
 <a
 class="bg-green-700 p-2 px-5 rounded-lg text-white hover:bg-green-400"
 href="/admin/produts" >back to product page</a> 
 
 <a
 class="bg-blue-700 p-2 flex gap-x-2 items-center px-5 rounded-lg text-white hover:bg-blue-400"
 href="/product-image/{{$product->id}}/edit" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
  </svg>Edit images</a>


    </div>

    
</x-layout-admin>

    
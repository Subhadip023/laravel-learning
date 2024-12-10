<x-layout>

    <section class="text-gray-600  body-font">
        <div class="container  py-24 mx-auto">
          <div class="flex  flex-wrap items-center m-4 justify-center">
        
          
            
         
            
           @foreach ($products as $product)
           <div class="shadow-lg rounded-lg p-2   w-72 m-2">
            <a href="/product/{{$product->id}}" class="block relative h-48 rounded overflow-hidden">
              <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{Storage::url($product->productImage[0]->path)}}">
              {{-- {{$product->productImage[0]->path}} --}}
            </a>
            <div class="mt-4">
              <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$product->category->name}}</h3>
              <h2 class="text-gray-900 title-font text-lg font-medium">{{$product->name}}</h2>
              <p class="mt-1">${{$product->price}}</p>
            </div>
          </div>

           @endforeach
           



          </div>
        </div>
      </section>
</x-layout>
<x-layout>

{{-- 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


    <section class="text-gray-600 body-font overflow-hidden w-full shadow-lg rounded-md">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ $product->name }}</h1>

                    <p class="leading-relaxed mb-4">{{ $product->description }}</p>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Color</span>
                        <span class="ml-auto text-gray-900">{{ $product->color }}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Dimension</span>
                        <span class="ml-auto text-gray-900">{{ $product->dimention }}</span>
                    </div>
                    <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                        <span class="text-gray-500">Min order quantity</span>
                        <span class="ml-auto text-gray-900">{{$product->min_order_quantity}}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price }}</span>

<div class="flex">
    <form action="{{ route('order.create') }}" method="GET">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
            Buy now
        </button>
    </form>
    
    

    <button
        class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            class="w-5 h-5" viewBox="0 0 24 24">
            <path
                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
            </path>
        </svg>
    </button>

</div>
                            

                       
                    </div>
                </div>

                <!-- Image Slider -->
                <div class="lg:w-1/2 w-full">
                    <div class="relative w-full">
                        <!-- Slider Container -->
                        <div id="slider" class="overflow-hidden relative">
                            <div class="flex transition-transform duration-500" style="transform: translateX(0%)"
                                id="slides">
                                @foreach ($product->productImage as $image)
                                    <div class="min-w-full">
                                        <img src="{{ Storage::url($image->path) }}" alt="Product Image"
                                            class="w-full h-auto object-cover rounded">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Previous Button -->
                        <button id="prev"
                            class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-300 text-gray-800 rounded-full w-10 h-10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>

                        <!-- Next Button -->
                        <button id="next"
                            class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-300 text-gray-800 rounded-full w-10 h-10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const slides = document.getElementById('slides');
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');

        let index = 0;

        prev.addEventListener('click', () => {
            index = (index > 0) ? index - 1 : slides.children.length - 1;
            slides.style.transform = `translateX(-${index * 100}%)`;
        });

        next.addEventListener('click', () => {
            index = (index < slides.children.length - 1) ? index + 1 : 0;
            slides.style.transform = `translateX(-${index * 100}%)`;
        });
    </script>

</x-layout>

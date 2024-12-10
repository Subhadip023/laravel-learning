<x-layout-admin>
    <div
        class="flex min-h-full flex-col justify-center w-2/3 mt-10 px-12 py-12 lg:px-3 bg-slate-400/20 shadow-lg rounded-e-lg duration-500">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center">Edit Product</h2>

        <form method="POST" class="w-[800px] mx-auto" action="{{ route('product.update', ['product' => $product->id]) }}">
            @csrf
            @method('PATCH')

            <div class="space-y-4">
                <!-- Product Name -->
                <x-input name="name" id="name" label="Product Name" type="text"
                    value="{{ old('name', $product->name) }}" required />

                <!-- Product Description -->
                <div class="flex flex-col">
                    <label for="description" class="text-sm font-medium text-gray-700">Product Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 border border-gray-300 rounded" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Category -->
                <div class="flex flex-col">
                    <label for="category_id" class="text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="mt-1 p-2 border border-gray-300 rounded"
                        required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                @if (count($product->productimage))
                <div>
                    <h3 class="text-xl font-semibold text-center my-10]">Products Images </h3>
                    <div
                        class="  flex flex-wrap  border shadow-lg rounded-lg bg-slate-200 py-10 my-5 mx-5 gap-2 items-center justify-center">
                        @foreach ($product->productImage as $productImage)
                            <div class=" image-inputs image-input-box b flex flex-wrap items-center justify-center">
                                <div class="image-input-box flex">
                                    {{-- {{$productImage}} --}}

                                    <div class="bg-gray-400 w-32 h-32 rounded-lg   flex items-center justify-center m-2"
                                        style="background-image: url({{ Storage::url($productImage->path) }})                   
                                                                       ">

                                        <img src="{{ Storage::url($productImage->path) }}"
                                            class="h-full w-full rounded-lg ">



                                    </div>

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div>


               

                    <div class="w-full ">
    
                        <a class="bg-blue-700 p-2 mx-auto my-10 w-fit flex gap-x-2 items-center px-5 rounded-lg text-white hover:bg-blue-400"
                            href="/product-image/{{ $product->id }}/edit"> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
                                viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>Edit product images</a>
    
                    </div>
    
    
                  </div>
    
                @else 
                <a href="/product-image/{{$product->id}}/create"
                    class="flex mx-auto   text-blue-700 border-2 w-fit p-2 px-5 border-blue-700  items-center  h-fit gap-1  my-2 rounded-lg hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                    </svg>
        Add product
                </a>

                @endif
             
                <!-- Color -->
                <x-input name="color" id="color" label="Color" type="text"
                    value="{{ old('color', $product->color) }}" />

                <!-- Dimension -->
                <x-input name="dimention" id="dimension" label="Dimension" type="text"
                    value="{{ old('dimension', $product->dimention) }}" />

                <!-- Material -->
                <x-input name="meterial" id="material" label="Material" type="text"
                    value="{{ old('material', $product->meterial) }}" />

                <!-- Price -->
                <x-input name="price" id="price" label="Price" type="number"
                    value="{{ old('price', $product->price) }}" step="0.01" required />

                <!-- Minimum Order Quantity -->
                <x-input name="min_order_quantity" id="min_order_quantity" label="Min Order Quantity" type="number"
                    value="{{ old('min_order_quantity', $product->min_order_quantity) }}" required />

                <!-- Star Rating -->
                <x-input name="star" id="star_rating" label="Star Rating" type="number"
                    value="{{ old('star_rating', $product->star) }}" step="0.1" max="5" min="0" />

                <!-- Stock -->
                <x-input name="stock" id="stock" label="Stock" type="number"
                    value="{{ old('stock', $product->stock) }}" required />

                <!-- SKU -->
                <x-input name="sku" id="sku" label="SKU" type="text"
                    value="{{ old('sku', $product->sku) }}" />

                <!-- Submit Button -->
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update
                        Product</button>
                </div>
            </div>
        </form>
    </div>
</x-layout-admin>

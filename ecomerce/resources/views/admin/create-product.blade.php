<x-layout-admin>
    <div class="flex min-h-full flex-col justify-center w-2/3 px-6 py-12 lg:px-3 bg-slate-400/20 shadow-lg rounded-e-lg duration-500">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Add Product</h2>
        </div>

        <form action="{{ route('product.store') }}" class="w-2/3 mx-auto" method="POST">
            @csrf

            <!-- Product Name -->
            <x-input name="name" id="productName" label="Product Name" type="text" value="{{ old('name') }}" required />

              <!-- SKU -->
              <x-input name="sku" id="product_sku" label="SKU" type="text" value="{{ old('sku') }}" />


            <!-- Product Description -->
            <div class="flex flex-col">
                <label for="description" class="text-sm font-medium text-gray-700">Product Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 p-2 border border-gray-300 rounded" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category -->
            <div class="flex flex-col">
                <label for="category_id" class="text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="mt-1 p-2 border border-gray-300 rounded" required>
                    <option value="" disabled selected>
                        Select Category
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Color -->
            <x-input name="color" id="color" label="Color" type="text" value="{{ old('color') }}" />

            <!-- Dimension -->
            <x-input name="dimention" id="dimension" label="Dimension" type="text" value="{{ old('dimention') }}" />

            <!-- Material -->
            <x-input name="meterial" id="material" label="Material" type="text" value="{{ old('meterial') }}" />

            <!-- Price -->
            <x-input name="price" id="price" label="Price" type="number" value="{{ old('price') }}" step="0.01" required />

            <!-- Minimum Order Quantity -->
            <x-input name="min_order_quantity" id="min_order_quantity" label="Min Order Quantity" type="number" value="{{ old('min_order_quantity') }}" required />

            <!-- Stock -->
            <x-input name="stock" id="stock" label="Stock" type="number" value="{{ old('stock') }}" required />

          


            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Product</button>
            </div>
        </form>
    </div>
</x-layout-admin>

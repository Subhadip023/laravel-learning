<x-layout>

    {{-- create order
{{$product}}

{{$user->address}} --}}


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="flex min-h-full flex-col justify-center w-2/3  px-6 py-12 lg:px-3 bg-slate-400/20 shadow-lg rounded-e-lg " >
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">

        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Order for {{$product->name}}</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action='{{route("order.store")}}' method="POST">
        @csrf
        @method('POST')
        <x-input name="quantity" id="productQuantity" label="Order Quantity" type="number" value="{{$product->min_order_quantity}}"/>
        <input type="hidden" name="address_id" value="{{ $user->address->id }}">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="price" value="{{ $product->price }}" hidden>
<div class="flex justify-between">
    <h2>Total Price </h2>

    <p id="productPrice">${{$product->price}}</p>
</div>
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Order</button>
        </div>
      </form>
  
      
    </div>
  </div>


  <script>
    const productQuantity = document.getElementById('productQuantity');

    productQuantity.addEventListener("change", () => {  // Fixed typo in method name
        const unitPrice = {{ $product->price }};       // Get the product's unit price from the server
        const quantity = parseInt(productQuantity.value) || 0;  // Parse quantity, fallback to 0 if invalid
        const totalPrice = unitPrice * quantity;       // Calculate total price
        document.getElementById('productPrice').innerHTML = `$${totalPrice.toFixed(2)}`; // Update total price
    });
</script>

</x-layout>
@extends('layouts.masters')
@section('content')
<h1 class="text-center font-bold text-3xl">Items in Cart</h1>
@php
$totalamount = 0;
@endphp

<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="grid grid-cols-2 gap-5 px-24">
                <form action="{{ route('checkout') }}" method="GET">
                   @csrf
                    @foreach ($cartItems as $cart)
                        <div class="flex bg-gray-100 my-5 rounded shadow">
                            <img src="{{ asset('images/products/'.$cart->product->photopath) }}" class="h-32 w-44 object-cover shadow-lg my-2">
                            <div class="px-4 py-1 text-xl">
                                <!-- Hidden inputs to send product details -->
                                <input type="text" name="product_name[]" value="{{ $cart->product->product_name }}" hidden>
                                <h2 class="text-2xl font-bold">{{ $cart->product->product_name }}</h2>

                                <input type="text" name="price[]" value="{{ $cart->product->price }}" hidden>
                                <h2 class="text-2xl font-bold">{{ $cart->product->price }}</h2>

                                <!-- Quantity input with increment/decrement buttons -->
                                <div class="flex items-center my-2">
                                    <button type="button" class="sub-qty bg-red-500 text-white px-2">-</button>
                                    <input type="number" class="qty text-center w-12" name="quantity[]" value="{{ $cart->quantity }}" min="1">
                                    <button type="button" class="add-qty bg-green-500 text-white px-2">+</button>
                                </div>

                                <!-- Display product total (price * quantity) -->
                                <h2 class="text-2xl font-bold">{{ $cart->quantity * $cart->product->price }}</h2>

                                @php
                                    // Calculate total amount for all items
                                    $totalamount += $cart->quantity * $cart->product->price;
                                @endphp

                                <!-- Delete button for each cart item -->
                                <a class="bg-red-500 text-white px-4 py-2 rounded" href="{{ route('cart.remove', $cart->id) }}">Delete</a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Display the total amount -->
                    <div class="my-5">
                        <h2 class="text-3xl font-bold">Total Amount:{{ $totalamount }}</h2>
                    </div>

                    <!-- Submit the order -->
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.add-qty').forEach((btn) => {
        btn.addEventListener('click', function() {
            const qtyInput = this.parentElement.querySelector('.qty');
            qtyInput.value = parseInt(qtyInput.value) + 1;
        });
    });

    document.querySelectorAll('.sub-qty').forEach((btn) => {
        btn.addEventListener('click', function() {
            const qtyInput = this.parentElement.querySelector('.qty');
            if (parseInt(qtyInput.value) > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
            }
        });
    });
</script>
@endsection

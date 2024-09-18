@extends('layouts.app')
@section('content')
<h1 class="text-4xl text-bold text-center">Your Shopping Cart</h1>
    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else

    @php
    $total = $cartItems->reduce(function ($carry, $item) {
        return $carry + ($item->product->price * $item->quantity);
    }, 0);
@endphp


        <ul>
            @foreach($cartItems as $item)

            <img class="h-48 object-cover text-center" src="{{asset('images/products/'. $item->product->photopath)}}" alt="">
            <h2 class="text-xl font-semibold  ">{{ $cart->product->product_name}}</h2>
            <h2 class="text-gray-900">Quantity:{{ $cart->quantity}}</h2>
           <p class="text-gray-900 ">Rs{{ $cart->product->price }}</p>
            <p class="text-gray-700">Description:{{ $cart->product->description}}</p>

                {{-- <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: ${{ $item->product->price }}</li> --}}

            @endforeach

            <p>Total Price: ${{ $total }}</p>
        </ul>
        <!-- Add more details like price, total, etc. -->
    @endif
@endsection

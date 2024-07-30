@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <div class="bg-white rounded-lg">
        <img class="h-48 object-cover " src="{{asset('images/products/'.$product->photopath)}}" alt="">
        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
        <p class="text-gray-700">{{ $product->description }}</p>
        <p class="text-gray-900 font-bold">${{ $product->price }}</p>
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-lg shadow">Add to Cart</button>
    </div>
</div>
@endsection

@extends('layouts.masters')
@section('content')
{{-- Products --}}
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="grid grid-cols-4 gap-6 flex bg-gray-100 rounded-lg shadow-lg relative">
        @foreach($products as $product)
               <div class="bg-white rounded-lg shadow border">
                <img class="h-48 object-cover items-center" src="{{asset('images/products/'.$product->photopath)}}" alt="">
                <h2 class="text-xl font-semibold ">{{ $product->product_name }}</h2>
                <p class="text-gray-900 font-bold mt-2 ">Rs{{ $product->price }}</p>


                <form action="{{ route('addcart', $product->id) }}" method="POST" class="mt-4 flex flex-col items-center">
                    @csrf
                    <label for="quantity-{{ $product->id }}" class="sr-only">Quantity</label>
                    <input id="quantity-{{ $product->id }}" type="number" value="1" min="1" class="form-control mb-2 text-center" style="width:100px" name="quantity">
                    <input class="bg-red-500 text-white px-2 py-2" type="submit" value="Add to Shopping List">
                </form>

            </div>
        @endforeach
    </div>
</div>
@endsection


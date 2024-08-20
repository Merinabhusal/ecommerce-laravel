@extends('layouts.masters')
@section('content')
{{-- Products --}}
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="grid-cols-4 gap-6 flex px-6 py-2">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow border text-center">
                <img class="h-48 object-cover" src="{{asset('images/products/'.$product->photopath)}}" alt="">
                <h2 class="text-xl font-semibold ">{{ $product->product_name }}</h2>
                <p class="text-gray-900 font-bold ">Rs{{ $product->price }}</p>
                {{-- <p class="text-gray-700">{{ $product->description }}</p> --}}


                <form action="{{route('viewproduct', ['id' => $product->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
</div>


@endsection


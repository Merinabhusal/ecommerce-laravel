@extends('layouts.masters')
@section('content')
{{-- Products --}}
 <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="{{ $product->photopath }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-gray-900 font-bold">${{ $product->price }}</p>
                <a href="{{ route('products.show', $product->id) }}">View Product</a>
            </div>
        @endforeach
    </div>
</div>

@endsection


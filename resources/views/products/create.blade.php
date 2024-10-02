@extends('layouts.app')
@section('heading')
Create Product
@endsection
@section('content')
<div>
    <form action="{{ route('products.store') }}" method="GET" enctype="multipart/form-data">
        @csrf

        <!-- Priority -->
        <input type="text" name="priority" placeholder="Enter Priority" class="w-full rounded-lg">
        @error('priority')
            <p class="text-red-500 text-xs mt-0">{{ $message }}</p>
        @enderror

        <!-- Product Name -->
        <input type="text" name="product_name" placeholder="Enter Name" class="w-full rounded-lg">
        @error('product_name')
            <p class="text-red-500 text-xs mt-0">{{ $message }}</p>
        @enderror

        <!-- Photo Upload -->
        <input type="file" name="photopath" class="w-full rounded-lg mt-4 p-2 border border-gray-500">
        @error('photopath')
            <p class="text-red-500 text-xs mt-0">{{ $message }}</p>
        @enderror

        <!-- Description -->
        <input type="text" name="description" placeholder="Enter Description" class="w-full rounded-lg">
        @error('description')
            <p class="text-red-500 text-xs mt-0">{{ $message }}</p>
        @enderror

        <!-- Category ID -->
        <input type="text" name="category_id" placeholder="Enter Category ID" class="w-full rounded-lg">
        @error('category_id')
            <p class="text-red-500 text-xs mt-0">{{ $message }}</p>
        @enderror

        <!-- Price -->
        <input type="text" name="price" placeholder="Enter Price" class="w-full rounded-lg mt-4 p-2 border border-gray-500">
        @error('price')
            <p class="text-red-500 text-xs mt-0">{{ $message }}</p>
        @enderror

        <!-- Submit Button -->
        <div class="flex justify-center mt-4">
            <button type="submit" class="bg-blue-600 text-white mx-2 px-4 py-2 rounded-lg">Add Product</button>
            <a href="{{ route('products.index') }}" class="bg-red-600 text-white mx-2 px-10 py-2 rounded-lg">Exit</a>
        </div>
    </form>
</div>
@endsection

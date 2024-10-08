@extends('layouts.app')
@section('heading')
Edit Products
@endsection

@section('content')
<form action="{{route('products.update',$products->id)}}" method="POST" enctype="multipart/form-data" >
    @csrf
   <input type="text" name="priority" placeholder="Enter Priority" class="w-full rounded-lg"value="{{$products->priority}}">
    @error('priority')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

    <input type="text" name="product_name" placeholder="Enter Name" class="w-full rounded-lg"value="{{$products->product_name}}">
    @error('product_name')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

<input type="file" name="photopath" class="w-full rounded-lg mt-4 p-2 border border-gray-500"value="{{$products->photopath}}" >
    @error('photopath')

        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror


    <input type="text" name="description" placeholder="Enter description" class="w-full rounded-lg" value="{{$products->description}}">
    @error('description')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

    <input type="text" name="price" placeholder="Enter Price" class="w-full rounded-lg" value="{{$products->price}}">
    @error('price')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror



    <input type="text" name="category_id" placeholder="Enter Category ID" class="w-full rounded-lg">
    @error('category_id')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror


 <div class="flex justify-center gap-5">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Products</button>
        <a href="{{ route('products.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
    </div>

</form>
@endsection

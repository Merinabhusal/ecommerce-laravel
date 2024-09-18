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
                <p class="text-gray-700">{{ $product->description }}</p>
<form action="{{route('addcart',$product->id)}}"method="POST">
@csrf
<input type="number" value="1" min="1"class="form-control" style= "width:100px" name="quantity">
<br>
<input class="btn btn-primary"type="submit" value="Add Cart">

</form>

            </div>
        @endforeach
    </div>
</div>
@endsection


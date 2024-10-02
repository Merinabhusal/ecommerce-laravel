@extends('layouts.masters')
@section('content')
    <div class="container">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Products By Category</h1>
            <div class="grid-cols-4 gap-6 flex px-6 py-2">

        @foreach($category->products as $product)
        <form action="{{route('addcart',$product->id)}}"method="POST">
            @csrf
            <img class="h-48 object-cover" src="{{asset('images/products/'.$product->photopath)}}" alt="">
            <h2 class="text-xl font-semibold ">{{ $product->product_name }}</h2>
            <p class="text-gray-900 font-bold ">Rs{{ $product->price }}</p>

            <input type="number" value="1" min="1"class="form-control " style= "width:100px" name="quantity">
            <br>
            <input class="bg-red-500 text-white px-2 py-2 "type="submit" value="Add to Shopping list">

            </form>



    @endforeach
    </div>
        </div>
    </div>

@endsection



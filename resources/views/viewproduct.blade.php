@extends('layouts.masters')
@section('content')

    <div class="grid grid-cols-3 px-44 gap-10 my-10">
        <div>
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-96  object-cover rounded-lg hover:text-ellipsis">
        </div>
        <div class="border-l-2 px-2 col-span-2">
            <h2 class="text-3xl">{{$product->name}}</h2>
            <p class="text-red-700 text-2xl font-bold">Rs. {{$product->price}}/-</p>
             <p>Quantity</p>

       <form action="{{route('addcart',$product->id)}}"method="POST">
        @csrf
        <input type="number" value="1" min="1"class="form-control" style= "width:100px" name="quantity">
        <br>
        <input class="btn btn-primary"type="submit" value="Add to Shopping list">

        </form>

        </div>
    </div>

        <div class="px-44 my-10">
        <h2 class=" text-3xl">About this product</h2>
             <p>{{$product->description}}</p>
    </div>

    <script>
    var qty=document.getElementById('qty');

    function add(){
        qty.value++;
    }

    </script>

<script>
    var qty=document.getElementById('qty');

    function sub(){
        qty.value--;
    }

    </script>

@endsection

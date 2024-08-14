@extends('layouts.masters')
@section('content')

    <div class="grid grid-cols-3 px-44 gap-10 my-10">
         <div>
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-96  object-cover rounded-lg hover:text-ellipsis">
        </div>
        <div class="border-l-2 px-2 col-span-2">
            <h2 class="text-3xl">{{$product->product_name}}</h2>

            <p class="text-red-700 text-2xl font-bold">Rs. {{$product->price}}/-</p>
            <p>Quantity</p>
                <form action="{{ route('addcart', ['id' => $product->id]) }}" method="POST">

            <div class="mt-14">

                    @csrf

                    <div class="mt-4 flex items-center">
                        <button onclick="sub()">
                          <span class="bg-gray-200 px-4 py-2 font-bold text-xl">-</span>
                        </button>
                          <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" type="number" name="qty" value="1" id="qty" max="{{$product->stock}}" min="1">
                         <button onclick="add()">
                          <span class="bg-gray-200 px-4 py-2 font-bold text-xl">+</span>
                         </button>
                      </div>

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-lg shadow">Add to Cart</button>

            </div>
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

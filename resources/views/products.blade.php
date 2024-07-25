@extends('layouts.masters')
@section('content')

 {{-- Products --}}
<div class="text-center mt-10">
    <h1 class="text-4xl text-black mt-2 font-bold">Our Products</h1>
     <div class=" grid-grid-cols-1 md:grid grid-cols-5 gap-8">
     @foreach ($products as $product)
        <div class="rounded-lg shadow border justify-center">
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-48 object-cover rounded-t-lg w-1/3 transform transition duration-500 hover:scale-110">
            <p class="text-black text-bold text-xl">{{ $product->name }}</p>
            <p class="text-pink-800 ">{{ $product->price }}</p>

         </div>
 @endforeach
     </div>
   </div>

@endsection


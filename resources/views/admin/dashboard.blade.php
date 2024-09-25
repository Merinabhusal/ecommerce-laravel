@extends('layouts.app')
@section('heading')
Dashboard
@endsection
@section('content')

<div class="grid grid-cols-3 gap-10">
    <div class="bg-red-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Products</h1>
        <h1 class="text-4xl font-bold">{{$totalproducts}}</h1>
    </div>

    <div class="bg-green-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Items</h1>
        <h1 class="text-4xl font-bold">{{$totalitems}}</h1>
    </div>
{{--
    <div class="bg-blue-800 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Testimonials</h1>
        <h1 class="text-4xl font-bold"></h1>
    </div> --}}

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Categories</h1>
        <h1 class="text-4xl font-bold">{{$totalcategories}}</h1>
    </div>

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Contacts</h1>
        <h1 class="text-4xl font-bold">{{$totalcontacts}}</h1>
    </div>

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Carts</h1>
        <h1 class="text-4xl font-bold">{{$totalcarts}}</h1>
    </div>
</div>

@endsection

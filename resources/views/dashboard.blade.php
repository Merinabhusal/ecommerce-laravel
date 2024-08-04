@extends('layouts.app')
@section('heading')
Dashboard
@endsection
@section('content')

  <div class="grid grid-cols-3 gap-10">
 <div class="bg-red-600 text-white rounded-lg flex justify-between py-4 px-2">
            <h1 class="text-xl">Total Products</h1>
            <h1 class="text-4xl font-bold"></h1>
        </div>

        <div class="bg-green-600 text-white rounded-lg flex justify-between py-4 px-2">
            <h1 class="text-xl">Total Items</h1>
            <h1 class="text-4xl font-bold"></h1>
        </div>


        <div class="bg-blue-800 text-white rounded-lg flex justify-between py-4 px-2">
            <h1 class="text-xl">Testimonials</h1>
            <h1 class="text-4xl font-bold"> </h1>
        </div>

        <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
            <h1 class="text-xl">Brands</h1>
            <h1 class="text-4xl font-bold"> </h1>
        </div>

        <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
            <h1 class="text-xl">Category</h1>
            <h1 class="text-4xl font-bold"></h1>
        </div>

        <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
            <h1 class="text-xl">TotalContacts</h1>
            <h1 class="text-4xl font-bold"></h1>
        </div>

</div>
<div>

@endsection


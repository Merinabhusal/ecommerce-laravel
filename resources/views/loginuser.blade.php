@extends('layouts.masters')
@section('content')
<div class="w-1/4 mx-auto px-4 rounded-lg bg-red-300 shadow-lg my-2">
        <h2 class="font-bold text-4xl text-center my-4">Login</h2>
        <form action="{{route('loginuser')}}" method="POST">
            @csrf
            <input type="text" name="email" id="email" placeholder="Email" class="w-full px-2 rounded-lg my-2 w-1/4 ">
            <input type="password" name="password" id="password" placeholder="Password" class="w-full px-2 rounded-lg my-2 w-1/4">
            <input type="submit" value="Login" class=" w-1/4 block p-2 rounded-lg mx-auto my-4 bg-indigo-800 text-white">

            <a href="{{route('registeruser')}}">Register Here</a>
        </form>
    </div>

@endsection

@extends('layouts.masters')
@section('content')

<div class="w-full max-w-md mx-auto bg-gray-100 p-6 rounded shadow-md mt-10 mb-24">
        <h2 class="font-bold text-4xl text-center my-4">Login</h2>
        <form action="{{route('home')}}" method="POST">
            @csrf
            <input type="text" name="email" id="email" placeholder="Email" class="w-full px-2 rounded-lg  my-2">
            <input type="password" name="password" id="password" placeholder="Password" class="w-full px-2 rounded-lg  my-2">
            <input type="submit" value="Login" class="w-1/2 block p-2 rounded-lg mx-auto my-4 bg-indigo-600 text-white">

            <a href="{{route('user.register')}}">Register Here</a>
        </form>
    </div>

@endsection

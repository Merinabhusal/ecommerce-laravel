@extends('layouts.masters')
@section('content')
<div class="w-full max-w-md mx-auto bg-gray-100 p-6 rounded shadow-md">

        <h2 class="font-bold text-4xl text-center my-4">Register</h2>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Enter Name" class="w-full px-2 rounded-lg  my-4">

                @error('name')
                    <p>{{ $message }}</p>
                @enderror




            <input type="text" name="email" placeholder="Email" class="w-full px-2 rounded-lg  my-4">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <input type="password" name="password" placeholder="Password" class="w-full px-2 rounded-lg  my-4">

            <input type="password" name="password_confirmation" placeholder="Re-Enter Password" class="w-full px-2 rounded-lg my-4">
            <input type="submit" value="Register" class="w-1/2 block p-2 rounded-lg mx-auto my-4 bg-indigo-600 text-white">
            <a href="{{route('userlogin')}}">Login Here</a>
        </form>
    </div>

@endsection

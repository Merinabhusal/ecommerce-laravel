@extends('layouts.masters')
@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
        <p class="text-lg text-gray-700 mb-8">We would love to hear from you! Please fill out the form below to get in touch with us.</p>
        <div class="flex justify-center">
            @include('Contact.form')
        </div>
    </div>
</section>




@endsection

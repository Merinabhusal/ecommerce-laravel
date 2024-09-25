@extends('layouts.masters')
@section('content')

<!-- About Us Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-bold mb-4">About Grocery Store</h2>
                <p class="text-lg text-gray-700 mb-4">Welcome to Grocery Store, your one-stop destination for fresh, affordable, and high-quality groceries!</p>
                <p class="text-lg text-gray-700 mb-4">Over the years, we’ve grown into a trusted local grocery store, known for offering fresh produce, a wide variety of products, and an unbeatable shopping experience.</p>
                <p class="text-lg text-gray-700 mb-4">At our store, we believe that grocery shopping should be convenient, affordable, and enjoyable.</p>
            </div>
            <div class="text-center md:text-right">
                <img src="https://imageio.forbes.com/specials-images/imageserve/5f8ceed2e11880c542eca6b1/0x0.jpg?format=jpg&height=900&width=1600&fit=bounds" alt="About Us Image" class="w-full md:w-3/4  shadow-lg">
            </div>
        </div>
    </div>
</section>

@endsection

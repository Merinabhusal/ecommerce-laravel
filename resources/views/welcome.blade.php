@extends('layouts.masters')
@section('content')
 <!-- Hero Section -->
    <section id="home" class="bg-cover bg-center h-screen text-white flex items-center justify-center" style="background-image: url('https://images.stockcake.com/public/b/a/7/ba72712b-70a4-41b9-85c7-dd8d9ee99059_large/peaceful-blossom-bliss-stockcake.jpg');">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Welcome to Cosmetic Store</h1>
            <p class="text-lg md:text-2xl mb-6">Your one-stop shop for all beauty products</p>
            <a href="{{route('products')}}"class="text-black bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2  hover:opacity-70">Shop Now</a>
        </div>
    </section>

{{-- Products --}}
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow">
                <img class="h-48  object-cover " src="{{asset('images/products/'.$product->photopath)}}" alt="">
                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-gray-900 font-bold">${{ $product->price }}</p>
                <a href="{{route('products.show',$product->id)}}">View Product</a>
            </div>
        @endforeach
    </div>
</div>



 <section>
        <div class="text-center mt-2 mx-auto shadow-lg bg-gray-200 px-2 py-4">
            <h1 class="text-6xl font-bold">Simply Better,EveryDay</h1>
            <h2 class="text-xl mt-2">Store with the best makeup products</h2>
            <div class="mt-4">
               <a class="text-white  bg-blue-600 px-2 text-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2" href="">Learn More</a>
            </div>
           </div>
        </section>

          {{-- Featured Items --}}
 <section id="featured" class="py-12 bg-pink-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Featured Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
            @foreach ($featureditems as $featureditem )
            <div class="rounded-lg shadow border justify-center">
                <img src="{{asset('images/featureditems/'.$featureditem->photopath)}}" alt="" class=" w-full h-48 object-cover rounded-t-lg ">
                <p class="text-black text-bold text-xl">{{ $featureditem->name }}</p>
                <p class="text-pink-800 ">{{ $featureditem->price }}</p>
             </div>
     @endforeach
</div>
    </div>
</section>

 <!-- About Us Section -->
 <section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-bold mb-4">About Cosmetic Store</h2>
                <p class="text-lg text-gray-700 mb-4">We are passionate about beauty and skincare. Our mission is to provide high-quality products that enhance your natural beauty and promote healthy skin.</p>
                <p class="text-lg text-gray-700 mb-4">At Cosmetic Store, we believe in using ingredients that are gentle yet effective, ensuring that our products are suitable for all skin types.</p>
                <p class="text-lg text-gray-700 mb-4">Our team consists of experienced professionals who are dedicated to creating innovative and safe beauty solutions for our customers.</p>
            </div>
            <div class="text-center md:text-right">
                <img src="https://imagevars.gulfnews.com/2023/11/21/beauty-sale-stock_18bf23bd2b2_medium.jpg" alt="About Us Image" class="w-full md:w-3/4  shadow-lg">
            </div>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section id="testimonials" class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">What Our Customers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
           @foreach ($testimonials as $testimonial)
            <div class="bg-pink-100 p-6 rounded-lg shadow-lg">
               <div class="flex justify-center mb-4">
            <img src="{{asset('images/testimonials/'.$testimonial->photopath)}}" alt="" class=" h-24 object-cover rounded-full border-4 border-white w-1/3 ">
</div>
            <h3 class="text-xl font-bold">{{ $testimonial->name }}</h3>git pull origin main

            <p class="mt-2 text-gray-700">{{ $testimonial->description }}</p>
        </div>

        @endforeach

    </div>
    </div>
</section>



<!-- Categories Section -->
<section id="categories" class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Shop by Category</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($categories as $categories)
            <div class="bg-pink-100 p-6 rounded-lg shadow-lg">
                <img src="{{asset('images/categories/'.$categories->photopath)}}" alt="" class=" w-full h-48 object-cover rounded-t-lg">
                <p class="text-black text-bold text-xl">{{ $categories->name }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact Us --}}
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








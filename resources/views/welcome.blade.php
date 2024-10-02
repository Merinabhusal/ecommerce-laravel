@extends('layouts.masters')
@section('content')
@if (session('success'))
<div class="bg-green-500 text-white rounded ">
    {{ session('success') }}
</div>
@endif

 <!-- Hero Section -->
 <section id="home" class="bg-cover bg-center h-screen text-white flex items-center justify-center" style="background-image: url('https://w0.peakpx.com/wallpaper/484/117/HD-wallpaper-supermarket-and-background-grocery-store.jpg');">
        <div class="text-center text-black">
            <h1 class="text-4xl md:text-6xl font-bold  mb-4">Welcome to our Grocery Store</h1>
            <p class="text-lg md:text-2xl mb-6">Your one-stop shop for all products</p>
            <a href="{{route('products')}}"class="text-black bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2  hover:opacity-70">Shop Now</a>
        </div>
    </section>

{{-- Products --}}
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="grid grid-cols-5 gap-6 flex bg-gray-100 rounded-lg shadow-lg relative">
        @foreach($products as $product)
        <a href="{{route('viewproduct',$product->id)}}">
            <div class="bg-white rounded-lg shadow border text-center">
                <img class="h-48 object-cover items-center" src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              <h2 class="text-xl font-semibold ">{{ $product->product_name }}</h2>
             <p class="text-gray-900 font-bold mt-2">Rs{{ $product->price }}</p>
             <form action="{{ route('addcart', $product->id) }}" method="POST" class="mt-4 flex flex-col items-center">
                @csrf
                <label for="quantity-{{ $product->id }}" class="sr-only">Quantity</label>
                <input id="quantity-{{ $product->id }}" type="number" value="1" min="1" class="form-control mb-2 text-center" style="width:100px" name="quantity">
                <input class="bg-red-500 text-white px-2 py-2" type="submit" value="Add to Shopping List">
            </form>

</div>

 @endforeach
    </div>

    </div>


       <section>
        <div class="text-center mt-2 mx-auto shadow-lg bg-gray-200 px-2 py-4">
            <h1 class="text-6xl font-bold">Simply Better,EveryDay</h1>
            <h2 class="text-xl mt-2">Store with the best food products</h2>
            <div class="mt-4">
               <a class="text-white  bg-blue-600 px-2 text-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2" href="{{route('about')}}">Learn More</a>
            </div>
           </div>
        </section>


           {{--Featured Items --}}
          <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Featured Products</h1>
            <div class="grid-cols-4 gap-6 flex px-6 py-2">
            @foreach ($featureditems as $featureditem )
            <div class="rounded-lg shadow border justify-center">
                <img src="{{asset('images/featureditems/'.$featureditem->photopath)}}" alt="" class=" h-48 object-cover">
                <p class="text-black text-bold text-xl">{{ $featureditem->name }}</p>
                 {{-- <p class="text-pink-800 text-center ">{{ $featureditem->price }}</p> --}}



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


<!-- Testimonials Section -->
{{-- <section id="testimonials" class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">What Our Customers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
           @foreach ($testimonials as $testimonial)
            <div class="bg-pink-100 p-4 rounded-lg">
               <div class="flex justify-center mb-4">
            <img src="{{asset('images/testimonials/'.$testimonial->photopath)}}" alt="" class=" h-32 object-cover rounded-full w-1/4 ">
</div>
            <h3 class="text-xl font-bold">{{ $testimonial->name }}</h3>

            <p class="mt-2 text-gray-700">{{ $testimonial->description }}</p>
        </div>

        @endforeach

    </div>
    </div>
</section> --}}



<!-- Categories Section -->
<section id="categories" class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Category</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($categories as $categories)
            <div class="bg-pink-100 p-6 rounded-lg shadow-lg">
                <img src="{{asset('images/categories/'.$categories->photopath)}}" alt="" class=" w-full h-48 object-cover rounded-t-lg">
                <p class="text-black text-bold text-xl">{{ $categories->name }}</p>
                <a href="{{route('products.by.category',$categories->id)}}" class="text-blue-600 font-medium hover:text-blue-800">View Product</a>

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
<section>
    <iframe class="w-full"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.0267835696873!2d84.55804817497207!3d27.6236871291774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994e9f96cd3795b%3A0xf3921aeb41fa2ce0!2zTmV1cGFuZSBOaXdhc2goIOCkqOCljeCkr-CljOCkquCkvuCkqOClhyDgpKjgpL_gpLXgpL7gpLggKQ!5e0!3m2!1sen!2snp!4v1727281940420!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


</section>

@endsection








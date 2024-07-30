<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetic Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="scripts.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<!-- Navigation -->
<body>
    <nav class="bg-pink-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">Cosmetic Store</div>
            <ul class="flex space-x-4">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{route('products')}}"class="hover:underline">Products</a></li>
                <li><a href="{{route('about')}}"class="hover:underline">About</a></li>
                <li><a href="{{route('contacts')}}"class="hover:underline">Contact</a></li>
                <li><a href=""class="hover:underline">Login</a></li>
            </ul>
        </div>

    </nav>
<div>
    @yield('content')

</div>

</body>





<!-- Footer -->
<footer class="bg-pink-600 text-white text-center py-4">
<p>&copy; 2024 Cosmetic Store. All rights reserved.</p>
</footer>



<script>
var swiper = new Swiper(".swiper1", {
  slidesPerView: 1,
  autoplay:true,
 spaceBetween:10,

 breakpoints: {
    769: {
      slidesPerView:5,
      slidesPerGroup:2,
    },
  },
  scrollbar: {
    el: ".swiper-scrollbar",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

</script>
</html>



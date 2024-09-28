<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Grocery Store</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="scripts.js"></script>

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<!-- Navigation -->
<body>
    <nav class="bg-pink-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">Grocery Store</div>
            <ul class="flex space-x-4 text-center">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{route('products')}}"class="hover:underline">Products</a></li>
                <li><a href="{{route('about')}}"class="hover:underline">About</a></li>
                <li><a href="{{route('contacts')}}"class="hover:underline">Contact</a></li>
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('viewcart') }}">
                        <i class="fas fa-shopping-cart"></i> Cart
<sup>{{$count}}</sup>
                    </a>
                </li>


@guest
<li><a href="{{route('register')}}"class="hover:underline">Register</a></li>
<a href="{{ route('login') }}"><button class="px-4 py-2 rounded-md text-white bg-pink-500 hover:bg-pink-600">Login</button></a>
@endguest

@auth
<li><a href="" class="hover:underline">{{auth()->user()->name}}</a></li>

<form action="{{route('logout')}}" method="POST">

@csrf
<button type="submit" class="px-4 py-2 rounded-md text-white bg-pink-500 hover:bg-pink-600">Logout</button>
</form>



@endauth





            </ul>
        </div>

    </nav>
<div>
    @yield('content')

</div>

</body>





<!-- Footer -->
<footer class="bg-pink-600 text-white text-center py-4">
<p>&copy; 2024 Grocery Store. All rights reserved.</p>
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



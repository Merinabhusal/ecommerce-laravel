<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
    <title>Grocery Store</title>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="scripts.js"></script>
   <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>

   {{-- <script>

      var availableTags = [];
        $.ajax({
        method: "GET",
        url: "/product-list",
        success: function(response) {
//console.log(response);
        startAutoComplete(response);
        }
    });

    function startAutoComplete(availableTags) {

      $( "#search_product" ).autocomplete({
        source: availableTags
      });
    }
    </script> --}}

</head>
<!-- Navigation -->
<body>
    <div id="popup"class="fixed bg-opacity-50 backdrop-blur-md z-20 bg-blue-600 bottom-0 right-0 left-0 top-0 flex items-center hidden">
        <div class="w-4/12 mx-auto relative ">

            <i class="ri-close-line absolute text-2xl -right-1 -top-1 bg-white rounded-full px-1 cursor-pointer" id="closebtn"></i>


        </div>


            </div>


    <a id="topbtn" class="bg-indigo-900 cursor-pointer text-white rounded fixed right-5 bottom-10 p-2 text-2xl"><i class="ri-arrow-up-s-line"></i></a>
    <nav class="bg-pink-600 p-4 text-white sticky top-0 z-20">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">Grocery Store</div>
{{--
<div class="search-bar">
    <div class="input-group mb-3" style="max-width:600px;">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
        <input type="search" class="form-control"id="search_product" placeholder="search" aria-label="search" aria-describedby="basic-addon1">
      </div>


</div> --}}

            <ul class="flex space-x-4 text-center">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{route('products')}}"class="hover:underline">Products</a></li>
                <li><a href="{{route('about')}}"class="hover:underline">About</a></li>
                <li><a href="{{route('contacts')}}"class="hover:underline">Contact</a></li>
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('viewcart') }}">

                    <i class="fas fa-shopping-cart"> </i>
                    <sup>{{$count}}</sup>

                    </a>

                </li>
    @guest
<li><a href="{{route('register')}}"class="hover:underline">Register</a></li>
<a href="{{ route('login') }}"><button class=" text-white">Login</button></a>
@endguest

@auth
<li><a href="" class="hover:underline">{{auth()->user()->name}}</a></li>

<form action="{{route('logout')}}" method="POST">

@csrf
<button type="submit" class=" text-white">Logout</button>
</form>

@endauth
 </ul>
        </div>

    </nav>

         <nav class="block lg:hidden px-4 bg-white shadow-lg py-2 sticky top-0 z-20">

        <div class="flex justify-between items-center">

            <i onclick="toggleMenu()" class="ri-menu-line text-3xl"></i>
        </div>
        <div id="mynav"class="hidden">

            <div>
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{route('products')}}"class="hover:underline">Products</a></li>
                <li><a href="{{route('about')}}"class="hover:underline">About</a></li>
                <li><a href="{{route('contacts')}}"class="hover:underline">Contact</a></li>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('viewcart') }}">
                   <i class="fas fa-shopping-cart"></i> Cart
                    <sup>{{$count}}</sup>
                   </a>
               </li>
@guest
<li><a href="{{route('register')}}"class="hover:underline">Register</a></li>
<a href="{{ route('login') }}"><button class=" text-white">Login</button></a>
@endguest

@auth
<li><a href="" class="hover:underline">{{auth()->user()->name}}</a></li>

<form action="{{route('logout')}}" method="POST">

@csrf
<button type="submit" class=" text-white">Logout</button>
</form>
@endauth
</ul>
       </div>
  </div>
 </nav>

<div>
    @yield('content')

</div>

</body>





<!-- Footer -->

<footer>
        <div class="bg-pink-600 text-white text-center py-4">
        <p>&copy; 2024 Grocery Store. All rights reserved.</p>
    </div>
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





<script>
    var topbtn = document.getElementById('topbtn');
    topbtn.style.display = 'none';
    //alert('hello');
    window.onscroll = function() {
        scrollFunction();
    }
    function scrollFunction(){
        if(window.pageYOffset > 200)
        {
            topbtn.style.display = 'block';
        }

        else {
            topbtn.style.display ='none';
        }
    }
    topbtn.addEventListener('click',function(){
     window.scrollTo(0,0);
    });

</script>




<script>
    function toggleMenu()
    {
        var menu = document.getElementById('mynav');
        if(menu.style.display!=='block')
        {
            menu.style.display='block';
        }
        else{
            menu.style.display='none';
        }
    }
</script>


<script>
    var closebtn = document.getElementById('closebtn');
    closebtn.addEventListener('click',function(){
      document.getElementById('popup').style.display='none';
    });

   </script>



</html>



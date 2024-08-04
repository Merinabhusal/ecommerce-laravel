<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
            rel="stylesheet"
        />
        <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

  <body class="font-sans antialiased dark:bg-gray-700 dark:text-gray-100">
    <div class="flex">
        <div class=" fixed w-56 h-screen bg-gray-100 shadow">
            <img src="" class="mt-5 w-full" alt="">
            <div class="mt-5 text-blue-900">
                <a href=""class="bg-blue-500 text-white p-2 block hover:bg-blue-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-dashboard-2-line"></i> Dashboard</a>
                <a href="{{route('products.index')}}"class="p-2 block hover:bg-red-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-product-hunt-fill"></i>Products</a>
                <a href="{{route('featureditem.index')}}"class="p-2 block hover:bg-blue-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-product-hunt-fill"></i>Featured Items</a>
                <a href="{{route('testimonials.index')}}"class="p-2 block hover:bg-blue-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-feedback-line"></i>Testimonials</a>
                <a href="{{route('category.index')}}"class="p-2 block hover:bg-blue-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-book-shelf-line"></i>Shop By Category</a>
                <a href="{{route('contact.index')}}"class="p-2 block hover:bg-blue-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-contacts-book-line"></i>Contact</a>
                <a href="{{route('cart.index')}}"class="p-2 block hover:bg-red-500 hover:text-white text-lg border-b border-gray-300"><i class="ri-product-hunt-fill"></i>Cart</a>
                <form action="{{route('logout')}}" method="POST">
                  @csrf
                    <button type="submit" class="p-2 block w-full text-left hover:bg-blue-500 hover:text-white text-lg border-gray-300"><i class="ri-logout-box-line"></i>Logout</button>
                </form>


            </div>
        </div>
        <div class="p-4 flex-1 pl-60">
            <h1 class="text-3xl font-bold text-indigo-600">@yield('heading')</h1>
            <div class="text-right">
                <button id="theme-toggle" type="button"
                    class="text-gray-300 bg-gray-600 dark:text-gray-300 hover:bg-gray-400 border-gray-300 dark:hover:bg-gray-700 dark:border-gray-700 focus:outline-none rounded-lg text-sm  lg:py-0.5 lg:px-3 py-0.5 px-2">
                    <p id="theme-toggle-dark-icon" class="hidden  lg:text-sm">
                        <i class="ri-moon-fill"></i>
                    </p>
                    <p id="theme-toggle-light-icon" class="hidden  lg:text-sm">
                        <i class="ri-sun-fill"></i>
                    </p>
                </button>
            </div>

            <hr class="my-2 h-1 bg-red-600">

            @yield('content')
        </div>
    </div>

</body>

</html>

@extends('layouts.app')
@section('heading')
Dashboard
@endsection
@section('content')

<div class="grid grid-cols-3 gap-10">
    <div class="bg-red-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Products</h1>
        <h1 class="text-4xl font-bold">{{$totalproducts}}</h1>
    </div>

    <div class="bg-green-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Items</h1>
        <h1 class="text-4xl font-bold">{{$totalitems}}</h1>
    </div>
{{--
    <div class="bg-blue-800 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Testimonials</h1>
        <h1 class="text-4xl font-bold"></h1>
    </div> --}}

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Categories</h1>
        <h1 class="text-4xl font-bold">{{$totalcategories}}</h1>
    </div>

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Contacts</h1>
        <h1 class="text-4xl font-bold">{{$totalcontacts}}</h1>
    </div>

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total visits</h1>
        <h1 class="text-4xl font-bold"> {{$totalvisits}}</h1>
    </div>

    <div class="bg-pink-600 text-white rounded-lg flex justify-between py-4 px-2">
        <h1 class="text-xl">Total Carts</h1>
        <h1 class="text-4xl font-bold">{{$totalcarts}}</h1>
    </div>

</div>

<div>
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels:{!! $visitdate !!} ,
        datasets: [{
          label: 'No.of Visits',
          data: {!! $visits !!},
          borderWidth: 1,
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>








@endsection

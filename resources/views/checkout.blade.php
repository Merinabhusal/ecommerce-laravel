@extends('layouts.masters')
@section('content')

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">

  <form action="{{ route('order.store') }}" method="GET" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    @csrf

    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16 grid grid-cols-2">
      <div class="min-w-0 flex-1 space-y-8">
        <div class="space-y-4">
          <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Contact Information</h2>
           <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

            <!-- User's contact information -->
            <div>
              <label for="name" class="mb-2 block font-medium text-gray-900 dark:text-white"> Full Name</label>
              <input type="text" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white" name="person_name" placeholder="Full Name" value="{{ auth()->user()->name }}">
            </div>

            <div>
              <label for="email" class="mb-2 block font-medium text-gray-900 dark:text-white">Email</label>
              <input type="text" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
            </div>

            <div>
              <label for="phone" class="mb-2 block font-medium text-gray-900 dark:text-white">Phone</label>
              <input type="phone" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white" name="phone" placeholder="Phone" value="{{ auth()->user()->phone ?? '' }}">
            </div>

            <div>
              <label for="address" class="mb-2 block font-medium text-gray-900 dark:text-white">Address</label>
              <input type="text" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white" name="address" placeholder="Address" value="{{ auth()->user()->address ?? '' }}">
            </div>

           </div>
        </div>

        <!-- Payment on delivery option -->
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
          <div class="flex items-start">
            <div class="flex h-5 items-center">
              <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio" name="payment_method" value="pay_on_delivery" class="h-4 w-4 border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700" checked>
            </div>
            <div class="ml-4 text-sm">
              <label for="pay-on-delivery" class="font-medium text-gray-900 dark:text-white">Payment on delivery</label>
              <p id="pay-on-delivery-text" class="mt-1 text-xs text-gray-500 dark:text-gray-400">Rs100 payment processing fee</p>
            </div>
          </div>
        </div>

        <input type="submit" class="bg-green-500 text-white p-2 rounded mx-auto block mt-5 cursor-pointer" value="Place Order">
      </div>

      <!-- Cart and Total Summary -->
      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
        <div class="flow-root">
          <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
            <div class="min-w-0 flex-1 space-y-8">
              <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Checkout</h2>



 <dl class="flex items-center justify-between gap-4 py-3">

     <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Cart Total</dt>
<dd class="text-base font-medium text-gray-900 dark:text-white">{{$total}}</dd>
   </dl>

   <dl class="flex items-center justify-between gap-4 py-3">

    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Payment on Delivery fee</dt>
<dd class="text-base font-medium text-gray-900 dark:text-white">{{$paymentFee}}</dd>
  </dl>


  <dl class="flex items-center justify-between gap-4 py-3">

    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Final Total Amount</dt>
<dd class="text-base font-medium text-gray-900 dark:text-white">{{$total+$paymentFee}}</dd>
  </dl>




</div>
</div>
</div>
</div>
</div>
</div>
</form>
</section>

@endsection

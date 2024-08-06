@extends('layouts.masters')
@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Shopping Cart</h2>

</div>


@foreach ($cartItems as $cartItem)
<tr>
    <td>{{$cartItem->priority}}</td>
    <td>{{ $cartItem->name }}</td>
    <td>{{ $cartItem->price }}</td>
    <td>{{ $cartItem->Quantity}}</td>


    <td>

        <form action="{{ route('cart.remove', $cartItem->product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Remove</button>
        </form>
    </div>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <button type="submit">Place Order</button>
</form>

        </td>
</tr>
@endforeach
</section>




@endsection

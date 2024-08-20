@extends('layouts.masters')
@section('content')
@foreach($cartItems as $Item)
echo($item->product->product_name);
echo($item->product->price);
echo($item->product->description);
echo($item->product->photopath);

 <form action="{{ route('cart.remove', $cartItem->product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Remove</button>
        </form>
    </div>
@endforeach
<form action="" method="POST">
    @csrf
    <button type="submit">Place Order</button>
</form>


@endsection

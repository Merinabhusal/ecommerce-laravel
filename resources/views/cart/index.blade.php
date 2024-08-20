   @extends('layouts.app')
    @section('heading')
    Shopping Cart
    @endsection
     @section('content')

@if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if(empty($cartItems))
            <p>Your cart is empty.</p>
        @else

        <table id="myTable" class="display">

                <thead>
                    <tr>
                        <th>User_id</th>
                        <th>Product_id</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $id => $item)
                        <tr>
                            <td>{{ $item['user_id'] }}</td>
                            <td>{{ $item['product_id'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit">Clear Cart</button>
            </form> --}}
        @endif

        {{-- <a href="/">Continue Shopping</a> --}}


        <script>
            let table = new DataTable('#myTable');
            </script>




    @endsection

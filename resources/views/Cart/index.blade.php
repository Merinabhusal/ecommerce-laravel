@extends('layouts.app')
    @section('heading')
Shopping Cart
    @endsection

    @section('content')
 <table id="myTable" class="display">
        <thead>
            <tr>

               <th>Priority</th>
                <th>Name</th>
               <th>Price</th>
               <th>Quantity</th>

                <th>Actions</th>
            </tr>
        </thead>
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
            </table>


       <script>
       let table = new DataTable('#myTable');
       </script>




    @endsection

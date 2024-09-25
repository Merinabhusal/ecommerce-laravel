@extends('layouts.app')
@section('content')


    <h2 class="font-bold text-4xl text-blue-700">Orders</h2>
    <hr class="h-1 bg-blue-200">


    <table id="mytable" class="display">
        <thead>
            <th>Order Date</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->order_date}}</td>
                <td>{{$order->person_name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->shipping_address}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <a href="{{route('order.details',$order->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded-lg">View Details</a>
                    <a  onclick="return confirm('Are you sure to change status?')" href="{{route('order.status',[$order->id,"Processing"])}}" class="bg-green-600 text-white px-2 py-1 rounded-lg">Processing</a>
                    <a  onclick="return confirm('Are you sure to change status?')" href="{{route('order.status',[$order->id,"Completed"])}}" class="bg-green-600 text-white px-2 py-1 rounded-lg">Completed</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('category.destroy')}}" method="POST">
                    @csrf
                    <p class="font-bold text-2xl">Are you Sure to Delete?</p>
                    <input type="hidden" name="dataid" id="dataid" value="">
                    <div class="flex justify-center">
                        <input type="submit" value="Yes" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">
                        <a onclick="hideDelete()" class="bg-red-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>

    <script>

        function showDelete(x)
        {
            // $('#dataid').val(x);
            document.getElementById('dataid').value = x;
            document.getElementById('deleteModal').style.display = "block";
        }

        function hideDelete()
        {
            document.getElementById('deleteModal').style.display = "none";
        }
    </script>
@endsection

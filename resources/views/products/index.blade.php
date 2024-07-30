{{-- resources/views/products/index.blade.php --}}
 @extends('layouts.app')
@section('heading')
Products
@endsection

@section('content')
<div class="flex justify-end ">
<a class="text-2xl rounded-lg bg-green-500  text-white px-2 py-2" href="{{route('products.create')}}">Add Product</a>
</div>

<table id="myTable" class="display">
    <thead>
        <tr>

           <th>Priority</th>
            <th>Name</th>
           <th>Price</th>
           <th>Description</th>
           <th>Photopath</th>
            <th>Actions</th>
        </tr>
    </thead>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->priority}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img class="h-32" src="{{asset('images/products/'.$product->photopath)}}" alt=""></td>

                    <td>
                            <a href="{{route('products.edit',$product->id)}}" class="bg-blue-600 text-white px-4 py-1 rounded-lg mx-1">Edit</a>
                            <a class="bg-red-600 text-white px-4 py-1 mx-1 rounded-lg"onclick="showDelete('{{$product->id}}')">Delete</a>

                        </td>
                </tr>
            @endforeach
        </table>

       {{-- Delete Popup --}}
<div id="popup" class="fixed hidden items-center justify-center inset-0 bg-blue-600 bg-opacity-50 backdrop-blur-sm">
    <form action="{{route('products.destroy')}}"method="POST"class="bg-white px-10 py-5 rounded-lg">
        @csrf
        <h1 class="text-2xl font-bold">Are you sure to Delete?</h1>
        <div class="flex justify-center mt-4">
            <input type="hidden"id="dataid"name="dataid">
            <input type="submit"value="Yes"class="bg-blue-600 text-white px-10 py-2 rounded-lg cursor-pointer mx-2">
            <a onclick="hideDelete()"class="bg-red-600 text-white px-10 py-2 rounded-lg mx-2">No</a>
        </div>
    </form>

   </div>
   {{-- End Delete Popup --}}

   <script>
   let table = new DataTable('#myTable');
   </script>

   <script>
   function showDelete(id)
   {
    document.getElementById('dataid').value = id;
    var popup = document.getElementById('popup');
    popup.classList.remove('hidden');
    popup.classList.add('flex');
   }
   function hideDelete()
   {
    var popup = document.getElementById('popup');
    popup.classList.remove('flex');
    popup.classList.add('hidden');
   }
   </script>



@endsection








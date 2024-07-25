@extends('layouts.app')
@section('heading')
Contact Information
@endsection
@section('content')

<table id="myTable" class="display">
    <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
         </tr>
    </thead>
            @foreach ($contacts as $contact)

                    <tr>

                    <td>{{$contact->name }}</td>
                    <td>{{$contact->email }}</td>
                    <td>{{$contact->message }}</td>

                     <td>
                   <a class="bg-red-600 text-white px-4 py-1 mx-1 rounded-lg"onclick="showDelete('{{$contact->id}}')">Delete</a>

                        </td>
                </tr>
             @endforeach
             </table>

       {{-- Delete Popup --}}
<div id="popup" class="fixed hidden items-center justify-center inset-0 bg-blue-600 bg-opacity-50 backdrop-blur-sm">
    <form action="{{route('contact.destroy')}}"method="POST"class="bg-white px-10 py-5 rounded-lg">
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





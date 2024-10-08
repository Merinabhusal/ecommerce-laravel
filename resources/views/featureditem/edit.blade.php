@extends('layouts.app')
@section('heading')
Edit FeaturedItem
@endsection

@section('content')
<form action="{{route('featureditem.update',$featureditem->id)}}" method="POST" enctype="multipart/form-data" >
    @csrf
   <input type="text" name="priority" placeholder="Enter Priority" class="w-full rounded-lg"value="{{$featureditem->priority}}">
    @error('priority')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

    <input type="text" name="name" placeholder="Enter Name" class="w-full rounded-lg"value="{{$featureditem->name}}">
    @error('name')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

<input type="file" name="photopath" class="w-full rounded-lg mt-4 p-2 border border-gray-500"value="{{$featureditem->photopath}}" >
    @error('photopath')

        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

    <input type="text" name="price" placeholder="Enter Price" class="w-full rounded-lg" value="{{$featureditem->price}}">
    @error('price')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror


 <div class="flex justify-center gap-5">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update featured Item</button>
        <a href="{{ route('featureditem.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
    </div>

</form>
@endsection

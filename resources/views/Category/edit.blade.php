@extends('layouts.app')
@section('heading')
Edit Category
@endsection

@section('content')
<form action="{{route('category.update',$categories->id)}}" method="POST" enctype="multipart/form-data" >
    @csrf
   <input type="text" name="priority" placeholder="Enter Priority" class="w-full rounded-lg"value="{{$categories->priority}}">
    @error('priority')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

    <input type="text" name="name" placeholder="Enter Name" class="w-full rounded-lg"value="{{$categories->name}}">
    @error('name')
        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

<input type="file" name="photopath" class="w-full rounded-lg mt-4 p-2 border border-gray-500"value="{{$categories->photopath}}" >
    @error('photopath')

        <p class="text-red-500 text-xs mt-0">{{$message}}</p>
    @enderror

<div class="flex justify-center gap-5">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Category</button>
        <a href="{{ route('category.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
    </div>

</form>
@endsection

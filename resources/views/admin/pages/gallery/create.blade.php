@extends('admin.layout.master')

@section('title', 'Add New Gallery')

@section('content')

<h1 class="text-2xl font-semibold mb-6">Add New Gallery</h1>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label for="images" class="block mb-2 font-medium text-gray-700">Select Images</label>
        <input type="file" id="images" name="images[]" multiple accept="image/*" class="block w-full border border-gray-300 rounded px-3 py-2">
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Upload</button>
    <a href="{{ route('gallery.index') }}" class="ml-4 text-indigo-600 hover:underline">Back to Gallery List</a>
</form>

@endsection

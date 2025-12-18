@extends('admin.layout.master')
@section('title', 'Edit Facility')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Facility</h1>

<form action="{{ route('facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="font-semibold">Heading</label>
        <input type="text" name="heading" value="{{ $facility->heading }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div>
        <label class="font-semibold">Short Description</label>
        <textarea name="short_description" rows="3" class="w-full border px-3 py-2 rounded">{{ $facility->short_description }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Description</label>
        <textarea name="description" rows="6" class="w-full border px-3 py-2 rounded">{{ $facility->description }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Image</label><br>
        <img src="{{ asset('admin-assets/facility-page/' . $facility->image) }}" width="150" class="rounded mb-2">
        <input type="file" name="image" class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection

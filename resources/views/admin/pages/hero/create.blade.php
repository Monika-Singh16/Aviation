@extends('admin.layout.master')

@section('title', 'Add Hero Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Hero Banner</h1>

    <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-gray-700 font-semibold">Title</label>
            <input type="text" name="title" class="w-1/2 border rounded-lg p-2" required>
        </div>

        {{-- Sub Title --}}
        <div>
            <label class="block text-gray-700 font-semibold">Sub Title</label>
            <input type="text" name="sub_title" class="w-1/2 border rounded-lg p-2" required>
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-gray-700 font-semibold">Description</label>
            <textarea name="description" rows="4" class="w-1/2 border rounded-lg p-2"></textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-semibold">Banner Image</label>
            <input type="file" name="image" class="w-1/2 border rounded-lg p-2" accept="image/*">
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Status</label>
            <select name="is_active" class="w-1/2 border rounded-lg p-2">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

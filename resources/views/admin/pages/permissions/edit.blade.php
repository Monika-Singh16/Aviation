@extends('admin.layout.master')
@section('title', 'Edit Permission')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Permission</h1>

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Permission Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full border rounded-lg px-4 py-2 focus:ring-black @error('name') border-red-500 @enderror"
                   value="{{ old('name', $permission->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('permissions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Update
            </button>
        </div>
    </form>
</div>
@endsection

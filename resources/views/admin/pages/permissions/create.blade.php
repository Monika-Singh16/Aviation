@extends('admin.layout.master')
@section('title', 'Add Permission')

@section('content')
<h1 class="text-3xl font-bold mb-8 text-gray-800">Add New Permission</h1>

<form action="{{ route('permissions.store') }}" method="POST" class="space-y-6 max-w-lg">
    @csrf
    <div class="flex flex-col gap-2">
        <label class="font-semibold text-gray-800">Permission Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" 
               class="border p-2 rounded w-full border-gray-300 shadow-sm">
    </div>

    <div>
        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold text-lg">
            Save Permission
        </button>
        <a href="{{ route('permissions.index') }}" 
           class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-semibold text-lg">
            Cancel
        </a>
    </div>
</form>
@endsection

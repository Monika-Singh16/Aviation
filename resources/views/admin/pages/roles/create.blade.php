@extends('admin.layout.master')
@section('title', 'Add Role')

@section('content')
<h1 class="text-3xl font-bold mb-8 text-gray-800">Add New Role</h1>

<form action="{{ route('roles.store') }}" method="POST" class="space-y-6 max-w-lg">
    @csrf
    <div class="flex flex-col space-y-2">
        <label class="font-semibold text-gray-800 text-lg">Role Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" 
            class="border p-2 rounded w-full border-gray-300 shadow-sm focus:ring-2 focus:ring-black focus:outline-none">
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold text-lg">
            Save Role
        </button>
        <a href="{{ route('roles.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-semibold text-lg">
            Cancel
        </a>
    </div>
</form>
@endsection

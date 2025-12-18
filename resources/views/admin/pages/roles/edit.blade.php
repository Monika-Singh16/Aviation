@extends('admin.layout.master')
@section('title', 'Edit Role')

@section('content')
<h1 class="text-3xl font-bold mb-8 text-gray-800">Edit Role</h1>

<form action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-6 max-w-lg">
    @csrf
    @method('PUT')

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold text-gray-800">Role Name:</label>
        <input type="text" name="name" value="{{ $role->name }}" class="border p-2 rounded w-full md:w-1/2 border-gray-300 shadow-sm">
    </div>

    <div>
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold text-lg">
            Update Role
        </button>
        <a href="{{ route('roles.index') }}" class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-semibold text-lg">
            Cancel
        </a>
    </div>
</form>
@endsection

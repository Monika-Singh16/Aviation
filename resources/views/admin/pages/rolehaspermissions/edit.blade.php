@extends('admin.layout.master')
@section('title', 'Edit Role Permissions')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Permissions for Role: {{ $role->name }}</h1>

<form action="{{ route('role-permissions.update', $role->id) }}" method="POST" class="space-y-6 max-w-3xl">
    @csrf
    @method('PUT')

    <!-- Role Name (readonly) -->
    <div class="flex flex-col gap-2">
        <label class="font-semibold text-gray-900 text-xl">Role:</label>
        <input type="text" value="{{ $role->name }}" class="border p-3 rounded w-full border-gray-300 bg-gray-100 text-lg" readonly>
    </div>

    <!-- Permissions Checkboxes -->
    <div class="flex flex-col gap-4">
        <label class="font-semibold text-gray-900 text-xl">Permissions:</label>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($permissions as $permission)
                <label class="flex items-center gap-3 text-base bg-gray-50 p-3 rounded shadow-sm hover:bg-gray-100 transition">
                    <input type="checkbox" name="permission_ids[]" value="{{ $permission->id }}"
                        class="w-5 h-5 accent-blue-600"
                        {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                    <span class="ml-2 font-medium">{{ $permission->name }}</span>
                </label>
            @endforeach
        </div>
        @error('permission_ids')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-4 mt-6">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold text-lg">
            Update Permissions
        </button>
        <a href="{{ route('role-permissions.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg font-semibold text-lg">
            Cancel
        </a>
    </div>
</form>
@endsection

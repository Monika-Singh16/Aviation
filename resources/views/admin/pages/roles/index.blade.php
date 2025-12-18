@extends('admin.layout.master')
@section('title', 'Roles')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Roles</h1>
    <a href="{{ route('roles.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
       + Add Role
    </a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Role Name</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr class="hover:bg-gray-50 text-center">
            <td class="border px-4 py-2">{{ $role->id }}</td>
            <td class="border px-4 py-2">{{ $role->name }}</td>
            <td class="border px-4 py-2 flex gap-2 justify-center">
                <!-- Edit Icon -->
                <a href="{{ route('roles.edit', $role->id) }}" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-pen-to-square"></i>
                </a>

                <!-- Delete Icon -->
                <button onclick="openDeleteModal('roles', {{ $role->id }})" 
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection




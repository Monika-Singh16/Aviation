@extends('admin.layout.master')
@section('title', 'Role Permissions')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Role Permissions</h1>
</div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 border border-gray-300">Id</th>
                <th class="px-6 py-3 border border-gray-300">Role Name</th>
                <th class="px-6 py-3 border border-gray-300">Permissions</th>
                <th class="px-6 py-3 border border-gray-300">Actions</th>
            </tr> 
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr class="hover:bg-gray-50 text-center">
                <td class="px-6 py-3 border border-gray-300">{{ $loop->iteration }}</td>
                <td class="px-6 py-3 border border-gray-300">{{ $role->name }}</td>
                <td class="px-6 py-3 border border-gray-300">
                    @foreach($role->permissions as $permission)
                        <span class="inline-block bg-gray-200 text-gray-700 text-sm px-3 py-2 rounded mr-1 mb-1">
                            {{ $permission->name }}
                        </span>
                    @endforeach
                </td>
                <td class="px-6 py-3 border-b flex gap-2">
                    <!-- Edit Permissions -->
                    <a href="{{ route('role-permissions.edit', $role->id) }}"
                       class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                </td>
            </tr>
            @endforeach

            @if($roles->isEmpty())
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">No roles found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

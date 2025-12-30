@extends('admin.layout.master')
@section('title', 'Employees')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Employees</h1>
    <a href="{{ route('employees.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">+ Add Employee</a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Role</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $employee->name }}</td>
            <td class="border px-4 py-2">{{ $employee->email }}</td>
            <td class="border px-4 py-2">{{ $employee->role->name ?? '-' }}</td>
            <td class="border px-4 py-2 flex gap-2 justify-center">
                
                <!-- Edit Icon (Pen) -->
                <a href="{{ route('employees.edit', $employee->emp_id) }}" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center ">
                     <i class="fas fa-edit"></i>
                </a>

                 <!-- Delete Icon (Trash) -->
                <!-- <button 
                    onclick="openDeleteModal('employees', {{ $employee->emp_id }})" 
                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center ">
                     <i class="fas fa-trash"></i>
                </button> -->
                <!-- Delete Icon (Trash) -->
                @if(strtolower($employee->role->name ?? '') !== 'admin')
                    <button 
                        onclick="openDeleteModal('employees', {{ $employee->emp_id }})" 
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center ">
                        <i class="fas fa-trash"></i>
                    </button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

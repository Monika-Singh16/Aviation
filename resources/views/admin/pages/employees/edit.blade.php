@extends('admin.layout.master')
@section('title', 'Edit Employee')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Employee</h1>

<form action="{{ route('employees.update', $employee->emp_id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Name:</label>
        <input type="text" name="name" value="{{ $employee->name }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Email:</label>
        <input type="email" name="email" value="{{ $employee->email }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Role:</label>
        <select name="role_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" @if($employee->role_id == $role->id) selected @endif>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Designation:</label>
        <input type="text" name="designation" value="{{ $employee->designation }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Department:</label>
        <input type="text" name="department" value="{{ $employee->department }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Profile Picture:</label>
        <input type="file" name="profile_picture" class="border p-2 rounded w-full md:w-1/2">
    </div>

    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 mt-4 rounded-md text-lg w-[120px]">Update</button>
</form>
@endsection

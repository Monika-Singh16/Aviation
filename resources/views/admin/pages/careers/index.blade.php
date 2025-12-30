@extends('admin.layout.master')

@section('title', 'Careers')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Careers</h1>
    <a href="{{ route('careers.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Career
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Job Title</th>
            <th class="border px-4 py-2">Job Type</th>
            <th class="border px-4 py-2">Industry</th>
            <th class="border px-4 py-2">Salary</th>
            <th class="border px-4 py-2">City</th>
            <th class="border px-4 py-2">Date Opened</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($careers as $career)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $career->job_title }}</td>
            <td class="border px-4 py-2">{{ $career->job_type }}</td>
            <td class="border px-4 py-2">{{ $career->industry }}</td>
            <td class="border px-4 py-2">{{ $career->salary }}</td>
            <td class="border px-4 py-2">{{ $career->city }}</td>
            <td class="border px-4 py-2">{{ $career->date_opened }}</td>
            <td class="border px-4 py-2 flex gap-2 justify-center">
                <!-- View -->
                <a href="{{ route('careers.show', $career->id) }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                   title="View Career">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268
                                 2.943 9.542 7-1.274 4.057-5.065 7-9.542
                                 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </a>

                <!-- Edit -->
                <a href="{{ route('careers.edit', $career->id) }}"
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                   title="Edit Career">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
               <button onclick="openDeleteModal('careers', {{ $career->id }})" 
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-trash"></i>
                </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center py-4 text-gray-600">No Careers Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

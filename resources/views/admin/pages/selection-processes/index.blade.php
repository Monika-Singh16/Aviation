@extends('admin.layout.master')

@section('title', 'Selection Processes')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Selection Processes</h1>
    <a href="{{ route('selection_processes.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Selection Process
    </a>
</div>

<!-- @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif -->

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Course</th>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Value</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($selectionProcesses as $selectionProcess)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $selectionProcess->id }}</td>
            <td class="border px-4 py-2">{{ $selectionProcess->course->heading }}</td>
            <td class="border px-4 py-2">{{ $selectionProcess->heading }}</td>
           <td class="border px-4 py-2">
                @foreach($selectionProcess->value as $item)
                    <div><strong>{{ $item['key'] }}</strong>: {{ $item['value'] }}</div>
                @endforeach
            </td>

            <td class="border px-4 py-2 flex gap-2 justify-center">
                <!-- View -->
                <a href="{{ route('selection_processes.show', $selectionProcess->id) }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                   title="View Selection Process">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268
                                 2.943 9.542 7-1.274 4.057-5.065 7-9.542
                                 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </a>

                <!-- Edit -->
                <a href="{{ route('selection_processes.edit', $selectionProcess->id) }}"
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                   title="Edit Selection Process">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                 <button onclick="openDeleteModal('selection_processes', {{ $selectionProcess->id }})" 
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-4 text-gray-600">No Selection Processes Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

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

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Course</th>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($selectionProcesses as $selectionProcess)
        <tr class="hover:bg-gray-50 align-top">
            <td class="border px-4 py-2 text-center">
                {{ $selectionProcess->id }}
            </td>

            <td class="border px-4 py-2">
                {{ $selectionProcess->course->course_name ?? '-' }}
            </td>

            <td class="border px-4 py-2">
                {{ $selectionProcess->heading }}
            </td>

            <!-- Status -->
            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $selectionProcess->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $selectionProcess->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <!-- Actions -->
            <td class="border px-4 py-2">
                <div class="flex gap-2 justify-center">

                    <!-- View -->
                    <a href="{{ route('selection_processes.show', $selectionProcess->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('selection_processes.edit', $selectionProcess->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('selection_processes.destroy', $selectionProcess->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this record?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-4 text-gray-500">
                No Selection Processes Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

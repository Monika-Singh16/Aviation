@extends('admin.layout.master')

@section('title', 'Course Phases')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Course Phases</h1>
    <a href="{{ route('course_phases.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Course Phase
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
            <th class="border px-4 py-2">Course</th>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Icon</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($coursePhases as $coursePhase)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $coursePhase->id }}</td>
            <td class="border px-4 py-2">{{ $coursePhase->course->course_name }}</td>
            <td class="border px-4 py-2">{{ $coursePhase->heading }}</td>

            <td class="border px-4 py-2 text-center">
                <i class="{{ $coursePhase->icon }} fa-2x" style="color: #c9a961;"></i>
            </td>

            <td class="border px-4 py-2 text-center align-middle">
                <div class="flex items-center justify-center gap-2">
                    <!-- View -->
                    <a href="{{ route('course_phases.show', $coursePhase->id) }}"
                    title="View Course Phase" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('course_phases.edit', $coursePhase->id) }}"
                    class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                    title="Edit Course Phase">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete -->
                    <button onclick="openDeleteModal('course_phases', {{ $coursePhase->id }})"
                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                            title="Delete Course Phase">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-4 text-gray-600">No Course Phases Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

@extends('admin.layout.master')

@section('title', 'Courses')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Courses</h1>
    <a href="{{ route('courses.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Course
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
            <th class="border px-4 py-2">Course Name</th>
            {{-- <th class="border px-4 py-2">Slug (URL)</th>
            <th class="border px-4 py-2">Description</th> --}}
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2 w-96">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($courses as $course)
        <tr class="hover:bg-gray-50">
            
            <!-- ID -->
            <td class="border px-4 py-2 text-center">{{ $course->id }}</td>

            <!-- Course Name -->
            <td class="border px-4 py-2">{{ $course->course_name }}</td>

            {{-- <!-- Course URL -->
            <td class="border px-4 py-2">{{ $course->course_url }}</td>

            <!-- Description -->
            <td class="border px-4 py-2">{{ Str::limit($course->description, 50) }}</td> --}}

            <!-- Image -->
            {{-- <td class="border px-4 py-2 text-center">
                @if($course->image)
                    <img src="{{ asset($course->image) }}"
                        alt="Course Image"
                        class="w-16 h-16 object-cover rounded-lg mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No image</span>
                @endif
            </td> --}}

            <!-- Actions -->
            <td class="px-4 py-3 border">
                <div class="flex flex-wrap gap-2 justify-center">
                    <!-- View -->
                    <a href="{{ route('courses.show', $course->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View Course">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('courses.edit', $course->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Edit Course">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Add About-->
                    <a href="{{ route('course_about.create', ['course_id' => $course->id]) }}"
                        class="bg-purple-500 hover:bg-purple-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Add Course About">
                        <i class="fa-solid fa-star"></i>
                    </a>

                    <!-- Add Phase -->
                    <a href="{{ route('course_phases.create', ['course_id' => $course->id]) }}"
                        class="bg-purple-500 hover:bg-purple-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Add Course Phase">
                        <i class="fas fa-layer-group"></i>
                    </a>

                    <!-- Add Eligibility -->
                    <a href="{{ route('course_eligibilities.create', ['course_id' => $course->id]) }}"
                        class="bg-indigo-500 hover:bg-indigo-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Add Course Eligibility">
                        <i class="fas fa-check-circle"></i>
                    </a>

                    <!-- Add Selection Process -->
                    <a href="{{ route('selection_processes.create', ['course_id' => $course->id]) }}"
                        class="bg-teal-500 hover:bg-teal-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Add Selection Process">
                        <i class="fas fa-clipboard-list"></i>
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this course?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                            title="Delete Course">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center py-4 text-gray-600">No Courses Found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection

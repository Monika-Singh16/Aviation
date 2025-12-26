@extends('admin.layout.master')

@section('title', 'View course_about Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Course About Section Details</h1>

    <div class="space-y-6">
        <!-- Course -->
        <div>
            <p class="font-semibold text-gray-600">Course</p>
            <p class="text-gray-800">{{ $course_about->course->course_name ?? '-' }}</p>
        </div>
        <!-- Title -->
        <div>
            <h2 class="font-bold text-gray-700">Title:</h2>
            <p class="text-lg text-gray-900">{{ $course_about->title }}</p>
        </div>

        <!-- Description -->
        <div>
            <h2 class="font-bold text-gray-700">Description:</h2>
            <p class="text-gray-900 leading-relaxed text-justify">{{ $course_about->description }}</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Image 1 -->
            @if($course_about->image_1)
            <div>
                <h2 class="font-bold text-gray-700"> Image 1:</h2>
                <img src="{{ asset($course_about->image_1) }}"
                    class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif

            <!-- Image 2 -->
            @if($course_about->image_2)
            <div>
                <h2 class="font-bold text-gray-700"> Image 2:</h2>
                <img src="{{ asset($course_about->image_2) }}"
                    class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif

            <!-- Image 3 -->
            @if($course_about->image_3)
            <div>
                <h2 class="font-bold text-gray-700"> Image 3:</h2>
                <img src="{{ asset($course_about->image_3) }}"
                    class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif
        </div>

        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $course_about->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $course_about->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('course_about.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('course_about.edit', $course_about->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

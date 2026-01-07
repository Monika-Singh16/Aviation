@extends('admin.layout.master')

@section('title', 'View Course')

@section('content')
<h1 class="text-2xl font-bold mb-6">Course Details</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 ">

    <!-- LEFT SIDE : COURSE DETAILS -->
    <div class="space-y-4">

        <div>
            <p class="font-semibold text-gray-700">Course Name:</p>
            <p class="text-gray-900">{{ $course->course_name }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-700">Course URL (Slug):</p>
            <p class="text-gray-900">{{ $course->course_url }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-700">Duration:</p>
            <p class="text-gray-900">{{ $course->duration ?? 'N/A' }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-700 mb-1">Description:</p>
            <p class="text-gray-800 leading-relaxed text-justify">
                {{ $course->description }}
            </p>
        </div>

    </div>

    <!-- RIGHT SIDE : IMAGE -->
    <div class="flex justify-center items-start">
        @if($course->image)
            <div>
                <h2 class="font-semibold text-gray-700 mb-2">Image</h2>
                <img src="{{ asset($course->image) }}"
                    alt="{{ $course->course_name }}"
                    class="w-40 h-40 object-cover rounded-lg border shadow">
            </div>
        @endif 
    </div>

</div>

<!-- BACK BUTTON -->
<a href="{{ route('courses.index') }}"
    class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded">
    Back
</a>
@endsection

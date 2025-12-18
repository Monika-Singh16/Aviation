@extends('admin.layout.master')
@section('title', 'View Course')

@section('content')
<h1 class="text-2xl font-bold mb-6">Course Details</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start bg-white p-6 ">
    
    <!-- LEFT SIDE (TEXT DETAILS) -->
    <div class="space-y-5">
        <div>
            <p class="font-bold text-gray-700">Heading:</p>
            <p class="text-gray-800">{{ $course->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Sub Heading:</p>
            <p class="text-gray-800">{{ $course->sub_heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Price:</p>
            <p class="text-gray-800">₹{{ $course->price }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Title:</p>
            <p class="text-gray-800">{{ $course->title }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Duration:</p>
            <p class="text-gray-800">{{ $course->duration }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700 mb-1">Description:</p>
            <p class="text-gray-600 leading-relaxed">{{ $course->description }}</p>
        </div>
    </div>

    <!-- RIGHT SIDE (IMAGE) -->
    <div class="flex justify-center">
        <img src="{{ asset('admin-assets/images/home-page/courses/' . $course->image) }}" 
             alt="{{ $course->title }}" 
             class="w-80 h-60 object-cover rounded-xl shadow-md border border-gray-200">
    </div>
</div>

<a href="{{ route('courses.index') }}" 
   class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg shadow-md">
    Back
</a>
@endsection

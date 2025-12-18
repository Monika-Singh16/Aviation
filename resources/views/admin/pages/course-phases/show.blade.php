@extends('admin.layout.master')
@section('title', 'View Course Phase')

@section('content')
<h1 class="text-2xl font-bold mb-6">Course Phase Details</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start bg-white p-6 ">

    <!-- LEFT SIDE (TEXT DETAILS) -->
    <div class="space-y-5">
        <div>
            <p class="font-bold text-gray-700">Course:</p>
            <p class="text-gray-800">{{ $coursePhase->course->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Heading:</p>
            <p class="text-gray-800">{{ $coursePhase->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700 mb-1">Description:</p>
            <p class="text-gray-600 leading-relaxed">{{ $coursePhase->description }}</p>
        </div>
    </div>

    <!-- RIGHT SIDE (IMAGE) -->
    <div class="flex justify-center">
        <img src="{{ asset($coursePhase->image) }}"
             alt="{{ $coursePhase->heading }}"
             class="w-80 h-60 object-cover rounded-xl shadow-md border border-gray-200">
    </div>
</div>

<a href="{{ route('course-phases.index') }}"
   class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg shadow-md">
    Back
</a>
@endsection

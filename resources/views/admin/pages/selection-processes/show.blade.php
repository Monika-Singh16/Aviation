@extends('admin.layout.master')
@section('title', 'View Selection Process')

@section('content')
<h1 class="text-2xl font-bold mb-6">Selection Process Details</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start bg-white p-6 ">

    <!-- LEFT SIDE (TEXT DETAILS) -->
    <div class="space-y-5">
        <div>
            <p class="font-bold text-gray-700">Course:</p>
            <p class="text-gray-800">{{ $selectionProcess->course->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Heading:</p>
            <p class="text-gray-800">{{ $selectionProcess->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Description:</p>
            <p class="text-gray-800">{{ $selectionProcess->description ?: 'N/A' }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700 mb-1">Value:</p>
            <pre class="text-gray-600 leading-relaxed bg-gray-100 p-2 rounded">{{ json_encode(json_decode($selectionProcess->value), JSON_PRETTY_PRINT) }}</pre>
        </div>
    </div>

    <!-- RIGHT SIDE (EMPTY FOR NOW) -->
    <div class="flex justify-center">
        <p class="text-gray-500">No image for this record</p>
    </div>
</div>

<a href="{{ route('selection-processes.index') }}"
   class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg shadow-md">
    Back
</a>
@endsection

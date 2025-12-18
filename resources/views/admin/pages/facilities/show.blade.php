@extends('admin.layout.master')
@section('title', 'View Facility')

@section('content')
<h1 class="text-2xl font-bold mb-6">Facility Section</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start bg-white p-6 ">
    <div class="space-y-4">
        <p><strong>Heading:</strong></p>
        <p class="text-gray-700">{{ $facility->heading }}</p>
        <p><strong>Short Description:</strong></p>
        <p class="text-gray-700">{{ $facility->short_description }}</p>
        <p><strong>Description:</strong></p>
        <p class="text-gray-700">{{ $facility->description }}</p>
    </div>

    <div class="flex justify-center">
        <img src="{{ asset('admin-assets/facility-page/' . $facility->image) }}"
             class="w-80 h-60 object-cover rounded-xl shadow-md border border-gray-200">
    </div>
</div>

<a href="{{ route('facilities.index') }}" class="mt-6 inline-block bg-gray-700 text-white px-5 py-2 rounded-lg shadow-md">
    ← Back
</a>
@endsection

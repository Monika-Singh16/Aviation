@extends('admin.layout.master')

@section('title', 'View City')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        City Details
    </h1>

    <div class="space-y-6">

        <!-- State -->
        <div>
            <h2 class="font-bold text-gray-700">State:</h2>
            <p class="text-gray-900">
                {{ $city->state->name ?? '-' }}
            </p>
        </div>

        <!-- City Name -->
        <div>
            <h2 class="font-bold text-gray-700">City Name:</h2>
            <p class="text-lg text-gray-900">
                {{ $city->name }}
            </p>
        </div>

        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white
                {{ $city->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $city->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('cities.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('cities.edit', $city->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

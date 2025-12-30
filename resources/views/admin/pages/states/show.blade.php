@extends('admin.layout.master')
@section('title', 'View State')

@section('content')
<h1 class="text-2xl font-bold mb-6">State Details</h1>

<div class="bg-white p-6 rounded space-y-6">

    <!-- State Name -->
    <div>
        <h2 class="font-semibold text-gray-700">State Name</h2>
        <p class="text-lg text-gray-900">{{ $state->name }}</p>
    </div>

    <!-- Status -->
    <div>
        <h2 class="font-semibold text-gray-700">Status</h2>
        <span class="px-4 py-1 rounded text-white
            {{ $state->is_active ? 'bg-green-600' : 'bg-red-600' }}">
            {{ $state->is_active ? 'Active' : 'Inactive' }}
        </span>
    </div>

    <!-- Buttons -->
    <div class="flex gap-3 pt-4">
        <a href="{{ route('states.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
            Back
        </a>

        <a href="{{ route('states.edit', $state->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Edit
        </a>
    </div>
</div>
@endsection

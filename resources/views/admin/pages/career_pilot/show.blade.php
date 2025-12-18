@extends('admin.layout.master')

@section('title', 'View career_pilot Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Career Pilot Section Details</h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">
                <!-- Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Title:</h2>
                    <p class="text-lg text-gray-900">{{ $career_pilot->title }}</p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $career_pilot->description }}</p>
                </div>

                <!-- Card Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Card Title:</h2>
                    <p class="text-lg text-gray-900">{{ $career_pilot->card_title }}</p>
                </div>

                <!-- Card Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Card Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $career_pilot->card_description }}</p>
                </div>
            </div>
            <!-- Banner Image -->
            @if($career_pilot->image)
            <div>
                <h2 class="font-bold text-gray-700">Banner Image:</h2>
                <img src="{{ asset($career_pilot->image) }}"
                    class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif
        </div>
        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $career_pilot->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $career_pilot->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('career_pilot.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('career_pilot.edit', $career_pilot->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

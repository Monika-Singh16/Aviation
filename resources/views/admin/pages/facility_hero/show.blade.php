@extends('admin.layout.master')

@section('title', 'View Facility Hero')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Facility Hero Details</h1>

    <div class="flex flex-col md:flex-row gap-8">

        <!-- Left Column: Details & Stats -->
        <div class="w-full md:w-1/2 space-y-4">

            <!-- Facility Name -->
            <div>
                <h2 class="font-bold text-gray-700">Facility:</h2>
                <p class="text-lg text-gray-900">{{ $hero->facility->heading ?? 'N/A' }}</p>
            </div>

            <!-- Heading -->
            <div>
                <h2 class="font-bold text-gray-700">Heading:</h2>
                <p class="text-lg text-gray-900">{{ $hero->heading ?? '-' }}</p>
            </div>

            <!-- Description -->
            <div>
                <h2 class="font-bold text-gray-700">Description:</h2>
                <p class="text-gray-900 leading-relaxed text-justify">{{ $hero->desc ?? '-' }}</p>
            </div>

            <!-- Stats -->
            @if(!empty($hero->stat) && is_array($hero->stat))
            <div>
                <h2 class="font-bold text-gray-700 mb-2">Stats:</h2>
                <div class="space-y-4">
                    @foreach($hero->stat as $stat)
                        <div class="p-3 bg-gray-100 rounded-lg border border-gray-200">
                            <p class="text-xl font-semibold">{{ $stat['value'] ?? '-' }}</p>
                            <p class="text-gray-700">{{ $stat['label'] ?? '-' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Status -->
            <div>
                <h2 class="font-bold text-gray-700">Status:</h2>
                <span class="px-4 py-1 rounded-lg text-white 
                    {{ $hero->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $hero->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <!-- Right Column: Image -->
        @if($hero->image)
        <div class="flex-shrink-0">
            <h2 class="font-bold text-gray-700 mb-2">Image:</h2>
            <img src="{{ asset('admin-assets/facility-hero/' . $hero->image) }}"
                class="w-80 h-64 object-cover rounded-xl shadow-md border border-gray-200">
        </div>
        @endif

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('facility_hero.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('facility_hero.edit', $hero->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

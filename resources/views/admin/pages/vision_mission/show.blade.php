@extends('admin.layout.master')

@section('title', 'View vision_mission Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Vision & Mission Section Details</h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">
                <!-- Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Title:</h2>
                    <p class="text-lg text-gray-900">{{ $vision_mission->title }}</p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $vision_mission->description }}</p>
                </div>
            </div>

            <!-- Banner Image -->
            @if($vision_mission->image)
            <div class="flex justify-left">
                <div>
                    <h2 class="font-bold text-gray-700">Banner Image:</h2>
                    <img src="{{ asset($vision_mission->image) }}"
                        class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
                </div>
            </div>
            @endif

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1 -->
            <div>
                <h2 class="font-bold text-gray-700">Card 1:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $vision_mission->card_1 }}</p>
            </div>

            <!-- Card 2 -->
            <div>
                <h2 class="font-bold text-gray-700">Card 2:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $vision_mission->card_2 }}</p>
            </div>

            <!-- Card 3 -->
            <div>
                <h2 class="font-bold text-gray-700">Card 3:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $vision_mission->card_3 }}</p>
            </div>

            <!-- Card 4 -->
            <div>
                <h2 class="font-bold text-gray-700">Card 4:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $vision_mission->card_4 }}</p>
            </div>
        </div>
        <!-- Status -->
            <div>
                <h2 class="font-bold text-gray-700">Status:</h2>
                <span class="px-4 py-1 rounded-lg text-white 
                    {{ $vision_mission->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $vision_mission->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('vision_mission.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('vision_mission.edit', $vision_mission->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

@extends('admin.layout.master')

@section('title', 'View excellence Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Excellence Section Details</h1>

    <div class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Sub Title -->
            <div>
                <h2 class="font-bold text-gray-700">Sub Title:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $excellence->sub_title }}</p>
            </div>

            <!-- Title -->
            <div>
                <h2 class="font-bold text-gray-700">Title:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $excellence->title }}</p>
            </div>

            <!--Card Title -->
            <div>
                <h2 class="font-bold text-gray-700">Card Title:</h2>
                <p class="text-lg text-gray-900 text-justify">{{ $excellence->card_title }}</p>
            </div>

            <!--Card Icon -->
            <div>
                <h2 class="font-bold text-gray-700">Card Icon:</h2>
                <i class="{{ $excellence->icon }}" style="color:#c9a868; font-size:32px;"></i>
            </div>

            <!-- Status -->
            <div>
                <h2 class="font-bold text-gray-700">Status:</h2>
                <span class="inline-block px-4 py-1 rounded-lg text-white
                    {{ $excellence->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $excellence->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <!--Card Description -->
            <div>
                <h2 class="font-bold text-gray-700">Card Description:</h2>
                <p class="text-gray-900 leading-relaxed text-justify">
                    {{ $excellence->card_description }}
                </p>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('excellence.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('excellence.edit', $excellence->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

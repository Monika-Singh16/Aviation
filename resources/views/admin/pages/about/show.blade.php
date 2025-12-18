@extends('admin.layout.master')

@section('title', 'View About Section')

@section('content')
<div class="p-8 bg-white ">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">About Section Details</h1>

    <div class="space-y-6">
        <!-- Title -->
        <div>
            <h2 class="font-bold text-gray-700">Title:</h2>
            <p class="text-lg text-gray-900">{{ $about->title }}</p>
        </div>

        <!-- Subtitle -->
        <div>
            <h2 class="font-bold text-gray-700">Subtitle:</h2>
            <p class="text-lg text-gray-900">{{ $about->sub_title }}</p>
        </div>

        <!-- Description 1 -->
        <div>
            <h2 class="font-bold text-gray-700">Description 1:</h2>
            <p class="text-gray-900 leading-relaxed">{{ $about->description_1 }}</p>
        </div>

        <!-- Description 2 -->
        @if($about->description_2)
        <div>
            <h2 class="font-bold text-gray-700">Description 2:</h2>
            <p class="text-gray-900 leading-relaxed">{{ $about->description_2 }}</p>
        </div>
        @endif

        <!-- Main Image -->
        @if($about->image)
        <div>
            <h2 class="font-bold text-gray-700">Main Image:</h2>
            <img src="{{ asset($about->image) }}" 
                 alt="Main Image"
                 class="w-56 h-56 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
        </div>
        @endif

        <!-- Other Images -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach(['image_one'] as $img)
                @if($about->$img)
                <div>
                    <h2 class="font-bold text-gray-700 capitalize">
                        {{ str_replace('_', ' ', $img) }}:
                    </h2>
                    <img src="{{ asset($about->$img) }}" 
                         alt="{{ $img }}"
                         class="w-56 h-56 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
                </div>
                @endif
            @endforeach
        </div>

        <!-- Features -->
        @if($about->features)
        <div>
            <h2 class="font-bold text-gray-700 mb-2">Features:</h2>
            <ul class="list-disc ml-6 text-gray-900 space-y-1">
                @foreach(is_array($about->features) ? $about->features : json_decode($about->features, true) as $feature)
                    <li class="text-gray-800">{{ trim($feature) }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('about.index') }}" 
           class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition">
            Back
        </a>
        <a href="{{ route('about.edit', $about->id) }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
           Edit
        </a>
    </div>
</div>
@endsection

@extends('admin.layout.master')

@section('title', 'View about_page Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">About Page Section Details</h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">
                <!-- Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Title:</h2>
                    <p class="text-lg text-gray-900">{{ $about_page->title }}</p>
                </div>

                <!-- Heading -->
                <div>
                    <h2 class="font-bold text-gray-700">Heading:</h2>
                    <p class="text-lg text-gray-900">{{ $about_page->heading }}</p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $about_page->description }}</p>
                </div>

                <!-- Sub Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Sub Title:</h2>
                    <p class="text-lg text-gray-900">{{ $about_page->sub_title }}</p>
                </div>

                <!-- Number -->
                <div>
                    <h2 class="font-bold text-gray-700">Number:</h2>
                    <p class="text-lg text-gray-900">{{ $about_page->number }}</p>
                </div>

            </div>
            <div class="space-y-6">
                <!-- Banner Image -->
                @if($about_page->banner_image)
                <div>
                    <h2 class="font-bold text-gray-700">Banner Image:</h2>
                    <img src="{{ asset($about_page->banner_image) }}"
                        class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
                </div>
                @endif

                <!-- About Image -->
                @if($about_page->about_image)
                <div>
                    <h2 class="font-bold text-gray-700">About Image:</h2>
                    <img src="{{ asset($about_page->about_image) }}"
                        class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
                </div>
                @endif
            </div>
        </div>
        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $about_page->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $about_page->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('about_page.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('about_page.edit', $about_page->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

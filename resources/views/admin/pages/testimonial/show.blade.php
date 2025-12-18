@extends('admin.layout.master')

@section('title', 'View testimonial Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Testimonial Section Details</h1>

    <div class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="space-y-5">
                <!-- Name -->
                <div>
                    <h2 class="font-bold text-gray-700">Name:</h2>
                    <p class="text-lg text-gray-900">{{ $testimonial->name }}</p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">
                        {{ $testimonial->description }}
                    </p>
                </div>

                <!-- Status -->
                <div>
                    <h2 class="font-bold text-gray-700">Status:</h2>
                    <span class="inline-block px-4 py-1 rounded-lg text-white
                        {{ $testimonial->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>

            @if($testimonial->image)
            <div class="flex justify-left">
                <div>
                    <h2 class="font-bold text-gray-700">Image:</h2>
                    <img src="{{ asset($testimonial->image) }}"
                        class="w-64 h-64 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('testimonial.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('testimonial.edit', $testimonial->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

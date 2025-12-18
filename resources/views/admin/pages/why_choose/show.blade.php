@extends('admin.layout.master')

@section('title', 'View why_choose Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Why Choose Section Details</h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">
                <!-- Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Title:</h2>
                    <p class="text-lg text-gray-900 text-justify">{{ $why_choose->title }}</p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $why_choose->description }}</p>
                </div>
            </div>

            <!-- Banner Image -->
            @if($why_choose->image)
            <div>
                <h2 class="font-bold text-gray-700">Banner Image:</h2>
                <img src="{{ asset($why_choose->image) }}"
                    class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif
        </div>
        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $why_choose->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $why_choose->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('why_choose.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('why_choose.edit', $why_choose->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

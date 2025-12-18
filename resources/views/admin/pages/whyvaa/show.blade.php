@extends('admin.layout.master')

@section('title', 'View Hero Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Hero Section Details</h1>

    <div class="space-y-6">

        {{-- Main Title --}}
        <div>
            <h2 class="font-bold text-gray-700">Main Title:</h2>
            <p class="text-lg text-gray-900">{{ $whyvaa->main_title }}</p>
        </div>

        {{-- Main Description --}}
        <div>
            <h2 class="font-bold text-gray-700">Main Description:</h2>
            <p class="text-gray-900 leading-relaxed">{{ $whyvaa->main_desc }}</p>
        </div>

        {{-- Banner Image --}}
        @if($whyvaa->image)
        <div>
            <h2 class="font-bold text-gray-700">Banner Image:</h2>
            <img src="{{ asset($whyvaa->image) }}"
                class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
        </div>
        @endif


        {{-- Image Title --}}
        <div>
            <h2 class="font-bold text-gray-700">Image Title:</h2>
            <p class="text-lg text-gray-900">{{ $whyvaa->image_title }}</p>
        </div>

        {{-- Image Sub Title --}}
        <div>
            <h2 class="font-bold text-gray-700">Image Sub Title:</h2>
            <p class="text-lg text-gray-900">{{ $whyvaa->image_sub_title }}</p>
        </div>

        {{-- Image Sub Description --}}
        <div>
            <h2 class="font-bold text-gray-700">Image Sub Description:</h2>
            <p class="text-gray-900">{{ $whyvaa->image_sub_description }}</p>
        </div>

        {{-- Status --}}
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $whyvaa->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $whyvaa->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    {{-- Buttons --}}
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('whyvaa.index') }}" 
           class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('whyvaa.edit', $whyvaa->id) }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

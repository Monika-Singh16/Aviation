@extends('admin.layout.master')

@section('title', 'View FAQ')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">View FAQ</h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">
                <div>
                    <h2 class="text-lg font-semibold">Heading:</h2>
                    <p class=" text-gray-900">{{ $faq->heading ?? '-' }}</p>
                </div>
                
                <div>
                    <h2 class="text-lg font-semibold">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $faq->description ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="text-lg font-semibold">Question:</h2>
                    <p class=" text-gray-900">{{ $faq->question }}</p>
                </div>

                <div>
                    <h2 class="text-lg font-semibold">Answer:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $faq->answer }}</p>
                </div>
            </div>
            <!-- Image -->
            @if($faq->image)
            <div>
                <h2 class="font-bold text-gray-700">Image:</h2>
                <img src="{{ asset($faq->image) }}"
                    class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif
        </div>
        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $faq->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $faq->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>
    </div>
    <!-- Buttons -->
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('faq.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('faq.edit', $faq->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

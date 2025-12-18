@extends('admin.layout.master')
@section('title', 'View Advantage')

@section('content')
<div class="p-8 bg-white">

    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Advantage Details</h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">

                <!-- Sub Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Sub Title:</h2>
                    <p class="text-lg text-gray-900">{{ $advantage->sub_title }}</p>
                </div>

                <!-- Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Title:</h2>
                    <p class="text-lg text-gray-900">{{ $advantage->title }}</p>
                </div>

                <!-- Short Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Short Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">{{ $advantage->short_description }}</p>
                </div>

                {{-- Ratings --}}
                <div>
                    <p class="font-bold text-gray-700 mb-1">Details:</p>

                    @if(!empty($advantage->ratings) && is_array($advantage->ratings))
                        <ul class="bg-gray-100 p-3 rounded space-y-1">
                            @foreach($advantage->ratings as $key => $value)
                                <li class="text-gray-800">
                                    <span class="font-semibold">{{ $key }}</span>:
                                    {{ $value }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No details available.</p>
                    @endif
                </div>

            </div>
            <!-- Banner Image -->
            @if($advantage->banner_image)
            <div>
                <h2 class="font-bold text-gray-700">Banner Image:</h2>
                <img src="{{ asset($advantage->banner_image) }}"
                    class="w-100 h-80 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
            </div>
            @endif
        </div>
        <!-- Status -->
        <div>
            <h2 class="font-bold text-gray-700">Status:</h2>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $advantage->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $advantage->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>
    </div>


    {{-- Buttons --}}
    <div class="mt-10 flex items-center space-x-4">
        <a href="{{ route('advantage.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('advantage.edit', $advantage->id) }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>

</div>
@endsection

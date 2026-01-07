@extends('admin.layout.master')

@section('title', 'View Aircraft')

@section('content')
<div class="p-8 bg-white">

    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        Aircraft Details
    </h1>

    @php
        $features = json_decode($aircraft->features, true) ?? [];
    @endphp

    <div class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- LEFT CONTENT --}}
            <div class="space-y-5">

                <!-- Title -->
                <div>
                    <h2 class="font-bold text-gray-700">Title:</h2>
                    <p class="text-lg text-gray-900">{{ $aircraft->title }}</p>
                </div>

                <!-- Facility -->
                <div>
                    <h2 class="font-bold text-gray-700">Facility:</h2>
                    <p class="text-lg text-gray-900">
                        {{ $aircraft->facility->heading ?? 'N/A' }}
                    </p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="font-bold text-gray-700">Description:</h2>
                    <p class="text-gray-900 leading-relaxed text-justify">
                        {{ $aircraft->desc }}
                    </p>
                </div>

            </div>

            {{-- RIGHT CONTENT --}}
            <div class="space-y-5">

                <!-- Status -->
                <div>
                    <h2 class="font-bold text-gray-700">Status:</h2>
                    <span class="px-4 py-1 rounded-lg text-white 
                        {{ $aircraft->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                        {{ $aircraft->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <!-- Created Date -->
                <div>
                    <h2 class="font-bold text-gray-700">Created At:</h2>
                    <p class="text-gray-900">
                        {{ $aircraft->created_at->format('d M Y') }}
                    </p>
                </div>

            </div>

        </div>

        {{-- FEATURES --}}
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">
                Aircraft Features
            </h2>

            @if(count($features))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($features as $feature)
                    <div class="bg-gray-50 border rounded-xl p-4 shadow-sm">

                        @if(!empty($feature['image']))
                            <img src="{{ asset($feature['image']) }}"
                                class="w-full h-40 object-cover rounded-lg mb-3">
                        @endif

                        @if(!empty($feature['icon']))
                            <div class="text-xl text-gray-700 mb-2" style="color: #dcbb87">
                                <i class="{{ $feature['icon'] }}"></i>
                            </div>
                        @endif

                        <h3 class="font-bold text-lg text-gray-800">
                            {{ $feature['title'] ?? '-' }}
                        </h3>

                        <p class="text-gray-700 text-sm mt-1">
                            {{ $feature['description'] ?? '-' }}
                        </p>

                    </div>
                    @endforeach

                </div>
            @else
                <p class="text-gray-500">No features added.</p>
            @endif
        </div>

    </div>

    {{-- BUTTONS --}}
    <div class="mt-10 flex items-center space-x-4">

        <a href="{{ route('aircraft.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('aircraft.edit', $aircraft->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>

    </div>

</div>
@endsection

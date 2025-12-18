@extends('admin.layout.master') 

@section('title', 'View Highlight')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-8 relative ">

    <!-- Title -->
    <h1 class="text-3xl font-bold text-gray-800 mb-10 border-b pb-3">
        Highlight Details
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Icon -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Icon</h2>
            <div class="w-14 h-14 flex items-center justify-center rounded-full text-white text-2xl shadow"
                 style="background-color: {{ $highlight->color }}">
                <i class="{{ $highlight->icon }}"></i>
            </div>
        </div>

        <!-- Color -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Color</h2>
            <span class="inline-block px-4 py-2 rounded-lg text-white font-semibold shadow"
                  style="background-color: {{ $highlight->color }}">
                {{ $highlight->color }}
            </span>
        </div>

        <!-- Heading -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Heading</h2>
            <p class="text-gray-700">{{ $highlight->heading }}</p>
        </div>

        <!-- Sub Heading -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Sub Heading</h2>
            <p class="text-gray-700">{{ $highlight->sub_heading ?? '-' }}</p>
        </div>

        <!-- Title -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Title</h2>
            <p class="text-gray-700">{{ $highlight->title }}</p>
        </div>

        <!-- Sub Title -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Sub Title</h2>
            <p class="text-gray-700">{{ $highlight->sub_title ?? '-' }}</p>
        </div>

        <!-- Short Description -->
        <div class="md:col-span-2">
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Short Description</h2>
            <p class="text-gray-600 leading-relaxed">{{ $highlight->short_description }}</p>
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Description</h2>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <p class="text-gray-600 leading-relaxed">{{ $highlight->description }}</p>
            </div>
        </div>

        <!-- Image -->
        <div class="md:col-span-2 flex flex-col ">
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Image</h2>
            @if($highlight->image)
                <img src="{{ asset('admin-assets/images/home-page/highlights/' . $highlight->image) }}"
                     alt="Highlight Image"
                     class="mt-2 w-80 h-64 object-cover rounded-lg shadow-lg border">
            @else
                <p class="text-gray-500 italic">No image available</p>
            @endif
        </div>

        <!-- Labels and Values -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Labels</h2>
            <ul class="list-disc ml-6 text-gray-600">
                @forelse($highlight->label ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="text-gray-500 italic">No labels</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Values</h2>
            <ul class="list-disc ml-6 text-gray-600">
                @forelse($highlight->value ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="text-gray-500 italic">No values</li>
                @endforelse
            </ul>
        </div>

        <!-- Label_1 and Value_1 -->
        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Label 1</h2>
            <ul class="list-disc ml-6 text-gray-600">
                @forelse($highlight->label_1 ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="text-gray-500 italic">No label 1 data</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Value 1</h2>
            <ul class="list-disc ml-6 text-gray-600">
                @forelse($highlight->value_1 ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="text-gray-500 italic">No value 1 data</li>
                @endforelse
            </ul>
        </div>

        <!-- Features -->
        <div class="md:col-span-2">
            <h2 class="font-bold text-gray-700 mb-2 text-lg">Features</h2>
            <ul class="list-disc ml-6 text-gray-600">
                @forelse($highlight->features ?? [] as $feature)
                    <li>{{ $feature }}</li>
                @empty
                    <li class="text-gray-500 italic">No features</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Back Button (Bottom Left) -->
    <div class="flex justify-start mt-10">
        <a href="{{ route('highlights.index') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center gap-2 transition duration-300 shadow">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</div>
@endsection

@extends('admin.layout.master')

@section('title','Record Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        Record Section Details
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- LEFT COLUMN --}}
        <div class="space-y-5">

            <!-- Sub Title -->
            <div>
                <h2 class="font-bold text-gray-700">Sub Title:</h2>
                <p class="text-lg text-gray-900">{{ $record->sub_title ?? '-' }}</p>
            </div>

            <!-- Title -->
            <div>
                <h2 class="font-bold text-gray-700">Title:</h2>
                <p class="text-lg text-gray-900">{{ $record->title ?? '-' }}</p>
            </div>
            
            <!-- Features -->
            <div>
                <h2 class="font-bold text-gray-700 mb-2">Features:</h2>
                @if(!empty($record->text) && is_array($record->text))
                    <ul class="bg-gray-100 p-3 rounded space-y-1">
                        @foreach($record->text as $key => $value)
                            <li class="text-gray-800">
                                <span class="font-semibold">{{ $key }}</span>:
                                {{ $value }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No features available.</p>
                @endif
            </div>
        </div>

        {{-- RIGHT COLUMN --}}
        <div class="space-y-5">
            <!-- Icon -->
            <div>
                <h2 class="font-bold text-gray-700">Card Icon:</h2>
                <i class="{{ $record->icon }}"
                    style="color:#c9a868; font-size:36px;"></i>
            </div>

            <!-- Status -->
            <div>
                <h2 class="font-bold text-gray-700">Status:</h2>
                <span class="inline-block px-4 py-1 rounded-lg text-white
                    {{ $record->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $record->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex gap-4">
        <a href="{{ route('record.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('record.edit', $record->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

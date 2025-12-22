@extends('admin.layout.master')

@section('title','Infrastructure Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        Infrastructure Section Details
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- LEFT COLUMN --}}
        <div class="space-y-5">

            <!-- Sub Title -->
            <div>
                <h2 class="font-bold text-gray-700">Sub Title:</h2>
                <p class="text-lg text-gray-900">{{ $infrastructure->sub_title ?? '-' }}</p>
            </div>

            <!-- Title -->
            <div>
                <h2 class="font-bold text-gray-700">Title:</h2>
                <p class="text-lg text-gray-900">{{ $infrastructure->title ?? '-' }}</p>
            </div>

            <!-- Card Title -->
            <div>
                <h2 class="font-bold text-gray-700">Card Title:</h2>
                <p class="text-lg text-gray-900">{{ $infrastructure->infrastructure_title ?? '-' }}</p>
            </div>

            <!-- Features -->
            <div>
                <h2 class="font-bold text-gray-700 mb-2">Details:</h2>

                @if(!empty($infrastructure->features) && is_array($infrastructure->features))
                    <ul class="bg-gray-100 p-4 rounded-lg list-disc list-inside space-y-2">
                        @foreach($infrastructure->features as $feature)
                            <li class="text-gray-800">{{ $feature }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No details available.</p>
                @endif
            </div>

            <!-- Card Description -->
            <div>
                <h2 class="font-bold text-gray-700">Card Description:</h2>
                <p class="text-gray-900 leading-relaxed">
                    {{ $infrastructure->infrastructure_description ?? '-' }}
                </p>
            </div>

        </div>

        {{-- RIGHT COLUMN --}}
        <div class="space-y-5">

            <!-- Image -->
            @if($infrastructure->infrastructure_image)
                <div>
                    <h2 class="font-bold text-gray-700">Banner Image:</h2>
                    <img
                        src="{{ asset($infrastructure->infrastructure_image) }}"
                        class="w-full max-w-sm h-60 object-cover rounded-xl shadow-md mt-3 border"
                        alt="Infrastructure Image">
                </div>
            @endif

            <!-- Icon -->
            <div>
                <h2 class="font-bold text-gray-700">Card Icon:</h2>
                <i class="{{ $infrastructure->infrastructure_icon }}"
                    style="color:#c9a868; font-size:36px;"></i>
            </div>

            <!-- Status -->
            <div>
                <h2 class="font-bold text-gray-700">Status:</h2>
                <span class="inline-block px-4 py-1 rounded-lg text-white
                    {{ $infrastructure->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $infrastructure->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex gap-4">
        <a href="{{ route('infrastructure.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('infrastructure.edit', $infrastructure->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

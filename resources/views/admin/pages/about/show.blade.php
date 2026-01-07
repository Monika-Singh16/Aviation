@extends('admin.layout.master')

@section('title', 'View About Section')

@section('content')
<div class="p-8 bg-white rounded shadow">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        About Section Details
    </h1>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-5">
                {{-- Title --}}
                <div>
                    <h2 class="font-semibold text-gray-700">Title</h2>
                    <p class="text-lg text-gray-900">{{ $about->title }}</p>
                </div>

                {{-- Subtitle --}}
                <div>
                    <h2 class="font-semibold text-gray-700">Subtitle</h2>
                    <p class="text-lg text-gray-900">{{ $about->sub_title }}</p>
                </div>

                {{-- Description --}}
                <div>
                    <h2 class="font-semibold text-gray-700">Description</h2>
                    <p class="text-gray-800 leading-relaxed text-justify">
                        {{ $about->description }}
                    </p>
                </div>

                {{-- Features --}}
                @if($about->features && count($about->features))
                    <div>
                        <h2 class="font-semibold text-gray-700 mb-2">Features</h2>
                        <ul class="list-disc ml-6 space-y-1 text-gray-800">
                            @foreach($about->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Status --}}
                <div>
                    <h2 class="font-semibold text-gray-700">Status</h2>
                    <span class="inline-block px-4 py-1 rounded text-white
                        {{ $about->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                        {{ $about->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
            
            {{-- Images --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-5">
                    <div>
                        @if($about->image_one)
                            <div>
                                <h2 class="font-semibold text-gray-700 mb-2">Image One</h2>
                                <img src="{{ asset($about->image_one) }}"
                                    class="w-40 h-40 object-cover rounded-lg border shadow">
                            </div>
                        @endif
                    </div>

                    <div>
                        @if($about->image_two)
                            <div>
                                <h2 class="font-semibold text-gray-700 mb-2">Image Two</h2>
                                <img src="{{ asset($about->image_two) }}"
                                    class="w-40 h-40 object-cover rounded-lg border shadow">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Buttons --}}
    <div class="mt-10 flex gap-4">
        <a href="{{ route('about.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('about.edit', $about->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

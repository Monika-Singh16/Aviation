@extends('admin.layout.master')

@section('title', 'View Course Phase')

@section('content')
<div class="p-8 bg-white rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        Course Phase Details
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- LEFT SIDE -->
        <div class="space-y-6">

            <!-- Course -->
            <div>
                <p class="font-semibold text-gray-600 mb-1">Course</p>
                <p class="text-gray-800">
                    {{ $coursePhase->course->course_name ?? '-' }}
                </p>
            </div>

            <!-- Module Title -->
            <div>
                <p class="font-semibold text-gray-600 mb-1">Module Title</p>
                <p class="text-gray-800">{{ $coursePhase->title }}</p>
            </div>

            <!-- Heading -->
            <div>
                <p class="font-semibold text-gray-600 mb-1">Section Heading</p>
                <p class="text-gray-800">{{ $coursePhase->heading }}</p>
            </div>

            <!-- Description -->
            <div>
                <p class="font-semibold text-gray-600 mb-1">Description</p>
                <p class="text-gray-800 text-justify">
                    {{ $coursePhase->description }}
                </p>
            </div>

            <!-- Phase Description -->
            @if(!empty($coursePhase->desc))
                <div>
                    <p class="font-semibold text-gray-600 mb-1">Phase Description</p>
                    <p class="text-gray-800 text-justify">
                        {{ $coursePhase->desc }}
                    </p>
                </div>
            @endif

            <!-- Module Icon -->
            @if(!empty($coursePhase->icon))
                <div>
                    <p class="font-semibold text-gray-600 mb-1">Module Icon</p>
                    <div class="flex items-center gap-3">
                        <i class="fas {{ $coursePhase->icon }}"
                            style="color:#c9a961; font-size:28px;"></i>
                        <span class="text-gray-700">{{ $coursePhase->icon }}</span>
                    </div>
                </div>
            @endif

            <!-- Status -->
            <div>
                <p class="font-semibold text-gray-600 mb-1">Status</p>
                <span class="inline-block px-4 py-1 rounded-lg text-white text-sm
                    {{ $coursePhase->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $coursePhase->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="space-y-8">

            <!-- STATS -->
            @if(!empty($coursePhase->stats))
                <div>
                    <h2 class="text-lg font-semibold mb-4">Stats</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($coursePhase->stats as $stat)
                            <div class="p-4 border rounded text-center space-y-2">

                                @if(!empty($stat['icon']))
                                    <i class="fas {{ $stat['icon'] }}"
                                        style="color:#c9a961; font-size:26px;"></i>
                                @endif

                                <p class="text-2xl font-bold text-blue-600">
                                    {{ $stat['number'] ?? '-' }}
                                </p>

                                <p class="text-gray-600">
                                    {{ $stat['label'] ?? '-' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- FEATURES -->
            @if(!empty($coursePhase->features))
                <div>
                    <h2 class="text-lg font-semibold mb-4">Features</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($coursePhase->features as $feature)
                            <div class="flex items-start gap-3 border rounded p-4">
                                <i class="fas fa-check-circle text-blue-600 mt-1"></i>
                                <p class="text-gray-700">
                                    {{ $feature['text'] ?? '-' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- ACTIONS -->
    <div class="flex gap-3 mt-10">
        <a href="{{ route('course_phases.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
            Back
        </a>

        <a href="{{ route('course_phases.edit', $coursePhase->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
            Edit
        </a>
    </div>

</div>
@endsection
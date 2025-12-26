@extends('admin.layout.master')

@section('title', 'View Selection Process')

@section('content')
<h1 class="text-2xl font-bold mb-6">Selection Process Details</h1>

<div class="bg-white p-6 space-y-8">

    <!-- Basic Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="font-semibold text-gray-700">Course</p>
            <p class="text-gray-800">
                {{ $selectionProcess->course->course_name ?? '-' }}
            </p>
        </div>

        <div>
            <p class="font-semibold text-gray-700">Heading</p>
            <p class="text-gray-800">
                {{ $selectionProcess->heading }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Selection Criteria -->
        <div>
            <p class="font-semibold text-gray-700 mb-3">Selection Criteria</p>

            <div class="space-y-3">
                @forelse($selectionProcess->criteria as $index => $criteria)
                    <div class="border rounded p-4 bg-gray-50">
                        <p class="font-semibold text-gray-800">
                            {{ $index + 1 }}. {{ $criteria['title'] }}
                        </p>

                        <p class="text-gray-700 mt-1">
                            {{ $criteria['description'] }}
                        </p>

                        @if(!empty($criteria['extra']))
                            <p class="text-sm text-gray-500 mt-1">
                                Extra: {{ $criteria['extra'] }}
                            </p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500">No criteria added</p>
                @endforelse
            </div>
        </div>

        <!-- Footer Note -->
        <div>
            <p class="font-semibold text-gray-700">Footer Note</p>
            <p class="text-gray-800">
                {{ $selectionProcess->note ?: 'N/A' }}
            </p>
        </div>
    </div>

    <!-- Status -->
    <div>
        <p class="font-semibold text-gray-700 mb-1">Status</p>
        <span class="inline-block px-3 py-1 rounded text-white
            {{ $selectionProcess->is_active ? 'bg-green-600' : 'bg-red-500' }}">
            {{ $selectionProcess->is_active ? 'Active' : 'Inactive' }}
        </span>
    </div>
</div>

<!-- Action Buttons -->
<div class="mt-6 flex gap-4">
    <a href="{{ route('selection_processes.index') }}"
        class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
        Back
    </a>

    <a href="{{ route('selection_processes.edit', $selectionProcess->id) }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
        Edit
    </a>
</div>
@endsection

@extends('admin.layout.master')
@section('title', 'View Course Eligibility')

@section('content')
<h1 class="text-2xl font-bold mb-6">Course Eligibility Details</h1>

<div class="gap-10 bg-white p-6 rounded">

    <!-- LEFT SIDE (DETAILS) -->
    <div class="space-y-6">

        <!-- Course -->
        <div>
            <p class="font-bold text-gray-700">Course</p>
            <p class="text-gray-800">
                {{ $courseEligibility->course->course_name ?? '-' }}
            </p>
        </div>

        <!-- Eligibility Criteria -->
        <div>
            <p class="font-bold text-gray-700 mb-2">Eligibility Criteria</p>

            @if(!empty($courseEligibility->eligibilities))
                <ul class="bg-gray-100 p-4 rounded space-y-2 list-disc pl-8">
                    @foreach($courseEligibility->eligibilities as $item)
                        <li class="text-gray-800">
                            @if(!empty($item['label']))
                                <strong>{{ $item['label'] }}:</strong>
                            @endif
                            {{ $item['value'] }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No eligibility criteria available.</p>
            @endif
        </div>

        <!-- Status -->
        <div>
            <p class="font-bold text-gray-700">Status</p>
            <span class="px-4 py-1 rounded-lg text-white 
                {{ $courseEligibility->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                {{ $courseEligibility->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

</div>

<div class="mt-4 flex items-center space-x-4">
    <a href="{{ route('course_eligibilities.index') }}"
        class="inline-block bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
        Back
    </a>

    <a href="{{ route('course_eligibilities.edit', $courseEligibility->id) }}" 
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
        Edit
    </a>

</div>
@endsection

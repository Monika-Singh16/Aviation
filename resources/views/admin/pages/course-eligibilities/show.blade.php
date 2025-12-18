@extends('admin.layout.master')
@section('title', 'View Course Eligibility')

@section('content')
<h1 class="text-2xl font-bold mb-6">Course Eligibility Details</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start bg-white p-6 ">

    <!-- LEFT SIDE (TEXT DETAILS) -->
    <div class="space-y-5">
        <div>
            <p class="font-bold text-gray-700">Course:</p>
            <p class="text-gray-800">{{ $courseEligibility->course->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Heading:</p>
            <p class="text-gray-800">{{ $courseEligibility->heading }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700">Description:</p>
            <p class="text-gray-800">{{ $courseEligibility->description ?: 'N/A' }}</p>
        </div>

        <div>
            <p class="font-bold text-gray-700 mb-1">Eligibility Details:</p>

            @if(!empty($courseEligibility->value) && is_array($courseEligibility->value))
                <ul class="bg-gray-100 p-3 rounded space-y-1">
                    @foreach($courseEligibility->value as $item)
                        <li class="text-gray-800">
                            <span class="font-semibold">{{ $item['key'] ?? '—' }}</span>:
                            {{ $item['value'] ?? '—' }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No eligibility details available.</p>
            @endif
        </div>

    </div>

    <!-- RIGHT SIDE (EMPTY FOR NOW) -->
    <div class="flex justify-center">
        <p class="text-gray-500">No image for this record</p>
    </div>
</div>

<a href="{{ route('course_eligibilities.index') }}"
   class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg shadow-md">
    Back
</a>
@endsection

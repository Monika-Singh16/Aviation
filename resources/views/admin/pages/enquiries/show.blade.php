@extends('admin.layout.master')

@section('title', 'View Enquiry')

@section('content')
<div class="p-8 bg-white rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">
        Enquiry Details
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- LEFT SIDE -->
        <div class="space-y-6">

            <div>
                <p class="font-semibold text-gray-600 mb-1">Course</p>
                <p class="text-gray-800">
                    {{ $enquiry->course->course_name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Full Name</p>
                <p class="text-gray-800">
                    {{ $enquiry->first_name }} {{ $enquiry->last_name }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Gender</p>
                <p class="text-gray-800">
                    {{ $enquiry->gender ? ucfirst($enquiry->gender) : '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Date of Birth</p>
                <p class="text-gray-800">
                    {{ $enquiry->dob }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Height</p>
                <p class="text-gray-800">
                    {{ $enquiry->height ? $enquiry->height . ' cm' : '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Weight</p>
                <p class="text-gray-800">
                    {{ $enquiry->weight ? $enquiry->weight . ' kg' : '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Nationality</p>
                <p class="text-gray-800">
                    {{ $enquiry->nationality ?? '-' }}
                </p>
            </div>

            <div>
                <!-- MESSAGE -->
                @if(!empty($enquiry->message))
                    <div>
                        <p class="font-semibold text-gray-600 mb-2">Message</p>
                        <p class=" text-gray-700 text-justify">
                            {{ $enquiry->message }}
                        </p>
                    </div>
                @endif
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="space-y-6">

            <div>
                <p class="font-semibold text-gray-600 mb-1">Email</p>
                <p class="text-gray-800">
                    {{ $enquiry->email }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Mobile</p>
                <p class="text-gray-800">
                    {{ $enquiry->mobile }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Alternate Mobile</p>
                <p class="text-gray-800">
                    {{ $enquiry->alternate_mobile ?? '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">DGCA Medical Status</p>
                <p class="text-gray-800">
                    {{ $enquiry->dgca_medical_status ?? '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Educational Status</p>
                <p class="text-gray-800">
                    {{ $enquiry->educational_status ?? '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">Physics & Math (12th)</p>
                <span class="inline-block rounded-lg text-sm
                    ">
                    {{ $enquiry->physics_math_12th ? 'Yes' : 'No' }}
                </span>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">State</p>
                <p class="text-gray-800">
                    {{ $enquiry->state->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-600 mb-1">City</p>
                <p class="text-gray-800">
                    {{ $enquiry->city->name ?? '-' }}
                </p>
            </div>

        </div>
    </div>

    

    <!-- ACTIONS -->
    <div class="flex gap-3 mt-10">
        <a href="{{ route('enquiries.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
            Back
        </a>
    </div>

</div>
@endsection

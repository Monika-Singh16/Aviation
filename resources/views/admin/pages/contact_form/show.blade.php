@extends('admin.layout.master')

@section('title', 'View Inquiry')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">Inquiry Details</h1>

<div class="bg-white p-6 space-y-6">

    <!-- Basic Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="font-semibold text-gray-600">Name</p>
            <p class="text-gray-800">{{ $inquiry->name }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-600">Email</p>
            <p class="text-gray-800">{{ $inquiry->email }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-600">Phone</p>
            <p class="text-gray-800">{{ $inquiry->phone }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-600">Subject</p>
            <p class="text-gray-800">{{ optional($inquiry->course)->course_name ?? 'N/A'  }}</p>
        </div>

        <div>   
            <p class="font-semibold text-gray-600">Source</p>
            <p class="text-gray-800">
                {{ $inquiry->source }}
            </p>
        </div>

        <!-- Message -->
        <div>
            <p class="font-semibold text-gray-600 mb-2">Message</p>
            <div class=" text-gray-800 leading-relaxed">
                {{ $inquiry->message }}
            </div>
        </div>

        <!-- Date -->
        <div>
            <p class="font-semibold text-gray-600">Submitted On</p>
            <p class="text-gray-800">
                {{ $inquiry->created_at->format('d M Y') }}
            </p>
        </div>
    </div>
</div>

<!-- Buttons -->
<div class="mt-6 flex gap-4">
    <a href="{{ route('admin.pages.contact_form.index') }}"
        class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded">
        Back
    </a>
</div>
@endsection

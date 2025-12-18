@extends('admin.layout.master')

@section('title', 'Career Details')

@section('content')
<h1 class="text-2xl font-bold mb-6">Career Details</h1>

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Job Title -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Job Title</h2>
            <p>{{ $career->job_title }}</p>
        </div>

        <!-- Job Description -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Job Description</h2>
            <p>{{ $career->job_description }}</p>
        </div>

        <!-- Date Opened -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Date Opened</h2>
            <p>{{ $career->date_opened }}</p>
        </div>

        <!-- Job Type -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Job Type</h2>
            <p>{{ $career->job_type }}</p>
        </div>

        <!-- Industry -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Industry</h2>
            <p>{{ $career->industry }}</p>
        </div>

        <!-- Salary -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Salary</h2>
            <p>{{ $career->salary }}</p>
        </div>

        <!-- City -->
        <div>
            <h2 class="text-lg font-semibold mb-2">City</h2>
            <p>{{ $career->city }}</p>
        </div>

        <!-- State/Province -->
        <div>
            <h2 class="text-lg font-semibold mb-2">State/Province</h2>
            <p>{{ $career->state_province }}</p>
        </div>

        <!-- Country -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Country</h2>
            <p>{{ $career->country }}</p>
        </div>

        <!-- Zip/Postal Code -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Zip/Postal Code</h2>
            <p>{{ $career->zip_postal_code }}</p>
        </div>
    </div>

    <!-- Key Responsibilities -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Key Responsibilities</h2>
        <ul class="list-disc list-inside">
            @foreach($career->key_responsibilities as $item)
                <li>{{ $item }}</li>
            @endforeach
         </ul>
    </div>

    <!-- Key Process -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Key Process</h2>
        <ul class="list-disc list-inside">
            @foreach($career->key_process as $item)
                <li>{{ $item }}</li>
            @endforeach

        </ul>
    </div>

    <!-- Skills Qualification -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Skills Qualification</h2>
        <ul class="list-disc list-inside">
           @foreach($career->skills_qualification as $item)
                <li>{{ $item }}</li>
            @endforeach

        </ul>
    </div>

    <!-- Work Experience -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Work Experience</h2>
        <ul class="list-disc list-inside">
           @foreach($career->work_experience as $item)
                <li>{{ $item }}</li>
            @endforeach

        </ul>
    </div>

    <!-- Benefits -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Benefits</h2>
        <ul class="list-disc list-inside">
           @foreach($career->benefits as $item)
                <li>{{ $item }}</li>
            @endforeach

        </ul>
    </div>

    <!-- Actions -->
    <div class="mt-6 flex gap-4">
        <a href="{{ route('careers.edit', $career->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('careers.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Back to List</a>
    </div>
</div>
@endsection

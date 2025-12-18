@extends('admin.layout.master')

@section('title', 'View Home Career')

@section('content')
<h1 class="text-2xl font-bold mb-6">View Home Career</h1>

<div class="bg-white rounded p-6 shadow max-w-3xl">

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Heading</h2>
        <p>{{ $homeCareer->heading ?? '-' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Description</h2>
        <p>{{ $homeCareer->description ?? '-' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Label</h2>
        <pre class="whitespace-pre-wrap">{{ $homeCareer->label ?? '-' }}</pre>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Value</h2>
        <pre class="whitespace-pre-wrap">{{ $homeCareer->value ?? '-' }}</pre>
    </div>

    <a href="{{ route('homecareer.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded inline-block mt-4">Back to List</a>

</div>
@endsection

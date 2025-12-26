@extends('admin.layout.master')
@section('title', 'View Info')

@section('content')
<h1 class="text-2xl font-bold mb-6">Info Details</h1>

<div class="bg-white p-6 rounded shadow space-y-5">
    <div>
        <p class="font-semibold text-gray-700">Course Name</p>
        <p>{{ $info->course->course_name ?? '-' }}</p>
    </div>

    <div>
        <p class="font-semibold text-gray-700">Icon</p>
        <p>
            <i class="{{ $info->icon }}"></i>
            <span class="ml-2">{{ $info->icon }}</span>
        </p>
    </div>

    <div>
        <p class="font-semibold text-gray-700">Title</p>
        <p>{{ $info->title }}</p>
    </div>

    <div>
        <p class="font-semibold text-gray-700">Description</p>
        <p style="text-align: justify">{{ $info->description ?: 'N/A' }}</p>
    </div>

    <div>
        <p class="font-semibold text-gray-700">Status</p>
        <span class="px-3 py-1 rounded text-white
            {{ $info->is_active ? 'bg-green-600' : 'bg-red-500' }}">
            {{ $info->is_active ? 'Active' : 'Inactive' }}
        </span>
    </div>
</div>

<div class="mt-4 flex gap-3">
    <a href="{{ route('infos.index') }}"
       class="bg-gray-700 text-white px-5 py-2 rounded">
        Back
    </a>

    <a href="{{ route('infos.edit', $info->id) }}"
       class="bg-blue-600 text-white px-5 py-2 rounded">
        Edit
    </a>
</div>
@endsection

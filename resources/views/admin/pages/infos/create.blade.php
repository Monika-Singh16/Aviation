@extends('admin.layout.master')
@section('title', 'Add Info')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add Info</h1>

<form action="{{ route('infos.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Course -->
        <div>
        <label class="block font-semibold mb-1">Select Course</label>
        <select name="course_id" class="w-full border px-3 py-2 rounded">
            <option value="">-- Select Course --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course_name }}
                </option>
            @endforeach
        </select>
    </div>

        <!-- Icon -->
        <div>
            <label class="block font-semibold mb-1">Icon (FontAwesome class)</label>
            <input type="text" name="icon" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. fas fa-plane">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title -->
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
            
            {{-- Status --}}
            <label class="block font-semibold mb-1 mt-4">Status</label>
            <select name="is_active" class="w-full border px-3 py-2 rounded">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <!-- Description -->
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="4"
                class="w-full border px-3 py-2 rounded"></textarea>
        </div>

    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Save
    </button>

    <a href="{{ route('infos.index') }}"
        class="ml-3 bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">
        Back
    </a>
</form>
@endsection

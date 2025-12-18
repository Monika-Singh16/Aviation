@extends('admin.layout.master')
@section('title', 'Edit Course Phase')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Course Phase</h1>

<form action="{{ route('course_phases.update', $coursePhase->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Course Selection -->
    <div>
        <label class="block font-semibold mb-1">Course</label>
        <select name="course_id" placeholder="Select a course" class="w-full border px-3 py-2 rounded" required>
            <option value="">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $coursePhase->course_id == $course->id ? 'selected' : '' }}>{{ $course->heading }}</option>
            @endforeach
        </select>
    </div>

    <!-- Heading -->
    <div>
        <label class="block font-semibold mb-1">Heading</label>
        <input type="text" name="heading" value="{{ $coursePhase->heading }}" placeholder="Enter phase heading" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Description -->
    <div>
        <label class="block font-semibold mb-1">Description</label>
        <textarea name="description" rows="4" placeholder="Enter phase description" class="w-full border px-3 py-2 rounded" required>{{ $coursePhase->description }}</textarea>
    </div>

    <!-- Image -->
    <div>
        <label class="block font-semibold mb-1">Image</label>
        <input type="file" name="image" class="w-full border px-3 py-2 rounded" accept="image/*" onchange="previewImage(event)">
        <div class="mt-2 flex items-center gap-4">
            <img id="imagePreview" src="{{ asset($coursePhase->image) }}" class="w-40 rounded border" />
        </div>
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update</button>

    <a href="{{ route('course_phases.index') }}"
   class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">
    Back
</a>
</form>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.classList.remove('hidden');
    }
</script>
@endsection

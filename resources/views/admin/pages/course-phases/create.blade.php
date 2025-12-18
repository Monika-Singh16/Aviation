@extends('admin.layout.master')
@section('title', 'Add Course Phase')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add Course Phase</h1>

<form action="{{ route('course_phases.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Course Selection -->
    <div>
        <label class="block font-semibold mb-1">Course</label>
        <select name="course_id" class="w-full border px-3 py-2 rounded" required>
            <option value="">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ isset($selectedCourseId) && $selectedCourseId == $course->id ? 'selected' : '' }}>{{ $course->heading }}</option>
            @endforeach
        </select>
    </div>

    <!-- Heading -->
    <div>
        <label class="block font-semibold mb-1">Heading</label>
        <input type="text" name="heading" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Description -->
    <div>
        <label class="block font-semibold mb-1">Description</label>
        <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded" required></textarea>
    </div>

    <!-- Image -->
    <div>
        <label class="block font-semibold mb-1">Image</label>
        <input type="file" name="image" class="w-full border px-3 py-2 rounded" accept="image/*" onchange="previewImage(event)" required>
        <img id="imagePreview" class="mt-2 w-40 rounded hidden" />
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Submit</button>
</form>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.classList.remove('hidden');
    }
</script>
@endsection

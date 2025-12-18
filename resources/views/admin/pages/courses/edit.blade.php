@extends('admin.layout.master')

@section('title', 'Edit Course')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Course</h1>

<form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Course Name --}}
        <div>
            <label class="block font-semibold mb-1">Course Name</label>
            <input
                type="text"
                name="course_name"
                id="course_name"
                value="{{ old('course_name', $course->course_name) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Course URL (slug) --}}
        <div>
            <label class="block font-semibold mb-1">Course URL (Slug)</label>
            <input
                type="text"
                name="course_url"
                id="course_url"
                value="{{ old('course_url', $course->course_url) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Duration --}}
        <div>
            <label class="block font-semibold mb-1">Duration</label>
            <input
                type="text"
                name="duration"
                value="{{ old('duration', $course->duration) }}"
                class="w-full border px-3 py-2 rounded"
                placeholder="Example: 6 Months, 12 Weeks"
            >
        </div>

        {{-- Image --}}
        <div>
            <label class="block font-semibold mb-1">Image</label>
            <input
                type="file"
                name="image"
                class="w-full border px-3 py-2 rounded"
                accept="image/*"
                onchange="previewImage(event)"
            >

            <div class="mt-2 flex items-center gap-4">
                <img
                    id="imagePreview"
                    src="{{ asset($course->image) }}"
                    class="w-40 rounded border"
                    alt="Course Image"
                />
            </div>
        </div>

    </div>

    {{-- Description --}}
    <div>
        <label class="block font-semibold mb-1">Description</label>
        <textarea
            name="description"
            rows="4"
            class="w-full border px-3 py-2 rounded"
            required
        >{{ old('description', $course->description) }}</textarea>
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Update
    </button>

    <a href="{{ route('courses.index') }}"
       class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">
        Back
    </a>
</form>

<script>
    // Image Preview
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
    }

    // Auto-generate slug from course name (unless user edits slug manually)
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('course_name');
        const slugInput = document.getElementById('course_url');
        let slugEditedManually = false;

        slugInput.addEventListener('input', function () {
            slugEditedManually = true;
        });

        nameInput.addEventListener('input', function () {
            if (slugEditedManually) return;

            const slug = this.value
                .toLowerCase()
                .trim()
                .replace(/[\s_]+/g, '-')     // spaces to hyphen
                .replace(/[^a-z0-9-]/g, '')   // remove invalid chars
                .replace(/-+/g, '-')          // multiple hyphens → single
                .replace(/^-+|-+$/g, '');     // trim hyphens

            slugInput.value = slug;
        });
    });
</script>

@endsection

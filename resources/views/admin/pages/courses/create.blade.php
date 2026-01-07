@extends('admin.layout.master')

@section('title', 'Add Course')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add Course</h1>

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Course Name</label>
                <input
                    type="text"
                    name="course_name"
                    id="course_name"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. Private Pilot Licence"
                    value="{{ old('course_name') }}"
                    required
                >
                @error('course_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Course URL (Slug) --}}
            <div>
                <label class="block font-semibold mb-1">Course URL (Slug)</label>
                <input
                    type="text"
                    name="course_url"
                    id="course_url"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="auto-generated-from-course-name"
                    value="{{ old('course_url') }}"
                    required
                >
                @error('course_url')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Duration --}}
            <div>
                <label class="block font-semibold mb-1">Duration</label>
                <input
                    type="text"
                    name="duration"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. 6 Months / 12 Weeks"
                    value="{{ old('duration') }}"
                >
                @error('duration')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label class="block font-semibold mb-1">Image</label>
                <input
                    type="file"
                    name="image"
                    class="w-full border px-3 py-2 rounded"
                    accept="image/*"
                    {{-- onchange="previewImage(event)" --}}
                    required
                >
            </div>

        </div>

        <!-- Description -->
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea
                name="description"
                rows="4"
                class="w-full border px-3 py-2 rounded"
                required
            >{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Submit
        </button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.getElementById('course_name');
            const slugInput = document.getElementById('course_url');

            let slugManuallyChanged = false;

            slugInput.addEventListener('input', function () {
                slugManuallyChanged = true;
            });

            nameInput.addEventListener('input', function () {
                if (slugManuallyChanged) {
                    return;
                }

                const value = this.value || '';

                const slug = value
                    .toLowerCase()
                    .trim()
                    .replace(/[\s_]+/g, '-')        
                    .replace(/[^a-z0-9-]/g, '')    
                    .replace(/-+/g, '-')            
                    .replace(/^-+|-+$/g, '');        

                slugInput.value = slug;
            });
        });
    </script>
@endsection

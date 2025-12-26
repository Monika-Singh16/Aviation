@extends('admin.layout.master')

@section('title', 'Add course_about Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Course About Section</h1>

    <form action="{{ route('course_about.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div>
                {{-- COURSE SELECT (MOST IMPORTANT) --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Select Course</label>
                    <select name="course_id" class="w-full border p-2 rounded" required>
                        <option value="">-- Select Course --</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Title --}}
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2" required>

                {{-- Description --}}
                <label class="block text-gray-700 font-semibold mt-4">Description</label>
                <textarea name="description" rows="5" class="w-full border rounded-lg p-2"></textarea>

            </div>
            
            <div>
                {{-- Image 1--}}
                <label class="block text-gray-700 font-semibold mt-4">Background Image</label>
                <input type="file" name="image_1" class="w-full border rounded-lg p-2" accept="image/*">
            
                {{-- Image 2--}}
                <label class="block text-gray-700 font-semibold mt-4"> Circular Image</label>
                <input type="file" name="image_2" class="w-full border rounded-lg p-2" accept="image/*">

                {{-- Image 3--}}
                <label class="block text-gray-700 font-semibold mt-4">Image 3</label>
                <input type="file" name="image_3" class="w-full border rounded-lg p-2" accept="image/*">
            </div>


            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

@extends('admin.layout.master')

@section('title', 'Edit course_about Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Course About Section</h1>

    <form action="{{ route('course_about.update', $course_about->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $course_about->title) }}" 
                        class="w-full border rounded-lg p-2" 
                        required>
            </div>
            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $course_about->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$course_about->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description', $course_about->description) }}</textarea>
            </div>

            {{-- Image 1--}}
            <div>
                <label class="block text-gray-700 font-semibold">Image 1</label>
                <input type="file" name="image_1" class="w-full border rounded-lg p-2" accept="image/*">

                @if($course_about->image_1)
                    <img src="{{ asset($course_about->image_1) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Image">
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Image 2--}}
            <div>
                <label class="block text-gray-700 font-semibold">Image 2</label>
                <input type="file" name="image_2" class="w-full border rounded-lg p-2" accept="image/*">

                @if($course_about->image_2)
                    <img src="{{ asset($course_about->image_2) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Image">
                @endif
            </div>

            {{-- Image 3--}}
            <div>
                <label class="block text-gray-700 font-semibold">Image 3</label>
                <input type="file" name="image_3" class="w-full border rounded-lg p-2" accept="image/*">

                @if($course_about->image_3)
                    <img src="{{ asset($course_about->image_3) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Image">
                @endif
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

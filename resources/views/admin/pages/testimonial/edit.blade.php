@extends('admin.layout.master')

@section('title', 'Edit testimonial Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Testimonial Section</h1>

    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Row 1: Name & Image -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Name & Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Name</label>
                <input type="text"
                    name="name"
                    value="{{ old('name', $testimonial->name) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                    required>

                <!-- Status with top spacing -->
                <label class="block text-gray-700 font-semibold mb-1 mt-4">Status</label>
                <select name="is_active"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    <option value="1" {{ $testimonial->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$testimonial->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Image --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Image</label>
                <input type="file"
                    name="image"
                    class="w-full border rounded-lg p-2"
                    accept="image/*">

                @if($testimonial->image)
                    <img src="{{ asset($testimonial->image) }}"
                        class="mt-3 w-32 h-20 object-cover rounded-lg border"
                        alt="Testimonial Image">
                @endif
            </div>
        </div>

        <!-- Description (Full Width) -->
        <div class="mt-6">
            <label class="block text-gray-700 font-semibold mb-1">Description</label>
            <textarea name="description"
                    rows="3"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                    required>{{ old('description', $testimonial->description) }}</textarea>
        </div>

        {{-- Submit and Back--}}
        <a href="{{ route('testimonial.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>  
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white ml-3 px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

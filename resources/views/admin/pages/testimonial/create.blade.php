@extends('admin.layout.master')

@section('title', 'Add testimonial Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Testimonial Section</h1>

    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Row 1 : Name & Image --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Name & Status --}}
            <div>
                <label class="block text-gray-700 font-semibold">Name</label>
                <input type="text" name="name" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1 mt-4">Status</label>
            <select name="is_active" class="w-1/2 border rounded-lg p-2">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg p-2"></textarea>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

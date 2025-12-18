@extends('admin.layout.master')

@section('title', 'Add Hero Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add WHYVAA Section</h1>

    <form action="{{ route('whyvaa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Main Title --}}
        <div>
            <label class="block text-gray-700 font-semibold">Main Title</label>
            <input type="text" name="main_title" 
                   class="w-1/2 border rounded-lg p-2" 
                   placeholder="Enter main title"
                   required>
        </div>

        {{-- Main Description --}}
        <div>
            <label class="block text-gray-700 font-semibold">Main Description</label>
            <textarea name="main_desc" rows="4" 
                      class="w-1/2 border rounded-lg p-2"
                      placeholder="Enter main description"></textarea>
        </div>

        {{-- Banner Image --}}
        <div>
            <label class="block text-gray-700 font-semibold">Banner Image</label>
            <input type="file" name="image" 
                   class="w-1/2 border rounded-lg p-2"
                   accept="image/*">
        </div>

        {{-- Image Title --}}
        <div>
            <label class="block text-gray-700 font-semibold">Image Title</label>
            <input type="text" name="image_title" 
                   class="w-1/2 border rounded-lg p-2"
                   placeholder="Enter image title">
        </div>

        {{-- Image Sub Title --}}
        <div>
            <label class="block text-gray-700 font-semibold">Image Sub Title</label>
            <input type="text" name="image_sub_title" 
                   class="w-1/2 border rounded-lg p-2"
                   placeholder="Enter image sub title">
        </div>

        {{-- Image Sub Description --}}
        <div>
            <label class="block text-gray-700 font-semibold">Image Sub Description</label>
            <textarea name="image_sub_description" rows="3" 
                      class="w-1/2 border rounded-lg p-2"
                      placeholder="Enter image sub description"></textarea>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Status</label>
            <select name="is_active" class="w-1/2 border rounded-lg p-2">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

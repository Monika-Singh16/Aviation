@extends('admin.layout.master')

@section('title', 'Edit Hero Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Hero Banner</h1>

    <form action="{{ route('whyvaa.update', $whyvaa->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Main Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Main Title</label>
                <input type="text" 
                        name="main_title" 
                        value="{{ old('main_title', $whyvaa->main_title) }}"
                        class="w-full border rounded-lg p-2" >

                {{-- Banner Image --}}
                <label class="block text-gray-700 font-semibold mt-2">Banner Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">
                @if($whyvaa->image)
                    <img src="{{ asset($whyvaa->image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner">
                @endif

                {{-- Image Title --}}
                <label class="block text-gray-700 font-semibold mt-4">Image Title</label>
                <input type="text" 
                    name="image_title" 
                    class="w-full border rounded-lg p-2"
                    value="{{ old('image_title', $whyvaa->image_title) }}">
            </div>

            {{-- Main Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Main Description</label>
                <textarea name="main_desc" rows="4" 
                    class="w-full border rounded-lg p-2">{{ old('main_desc', $whyvaa->main_desc) }}</textarea>

                {{-- Image Sub Description --}}
                <label class="block text-gray-700 font-semibold mt-4">Image Sub Description</label>
                <textarea name="image_sub_description" rows="4" 
                    class="w-full border rounded-lg p-2">{{ old('image_sub_description', $whyvaa->image_sub_description) }}</textarea>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $whyvaa->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$whyvaa->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Image Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Image Sub Title</label>
                <input type="text" 
                    name="image_sub_title" 
                    class="w-full border rounded-lg p-2"
                    value="{{ old('image_sub_title', $whyvaa->image_sub_title) }}">
            </div>

        </div>
        
        {{-- Update Button --}}
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

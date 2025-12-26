@extends('admin.layout.master')

@section('title', 'Add Hero Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add WHYVAA Section</h1>

    <form action="{{ route('whyvaa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Main Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Main Title</label>
                <input type="text" name="main_title" 
                        class="w-full border rounded-lg p-2" 
                        placeholder="Enter main title">
                
                {{-- Banner Image --}}
                <label class="block text-gray-700 font-semibold mt-2">Banner Image</label>
                <input type="file" name="image" 
                        class="w-full border rounded-lg p-2"
                        accept="image/*">
            </div>

            {{-- Main Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Main Description</label>
                <textarea name="main_desc" rows="4" 
                            class="w-full border rounded-lg p-2"
                            placeholder="Enter main description"></textarea>
            </div>

            {{-- Image Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Image Title</label>
                <input type="text" name="image_title" 
                        class="w-full border rounded-lg p-2"
                        placeholder="Enter image title">

                {{-- Image Sub Title --}}
                <label class="block text-gray-700 font-semibold mt-2">Image Sub Title</label>
                <input type="text" name="image_sub_title" 
                        class="w-full border rounded-lg p-2"
                        placeholder="Enter image sub title">
            </div>

            {{-- Image Sub Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Image Sub Description</label>
                <textarea name="image_sub_description" rows="4" 
                        class="w-full border rounded-lg p-2"
                        placeholder="Enter image sub description"></textarea>
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
        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

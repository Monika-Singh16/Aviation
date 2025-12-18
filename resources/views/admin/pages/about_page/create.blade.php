@extends('admin.layout.master')

@section('title', 'Add about_page Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add About Page Section</h1>

    <form action="{{ route('about_page.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2">
            </div>

            {{-- Heading --}}
            <div>
                <label class="block text-gray-700 font-semibold">Heading</label>
                <input type="text" name="heading" class="w-full border rounded-lg p-2">
            </div>
            
            <div>
                {{-- Sub Title --}}
                <label class="block text-gray-700 font-semibold">Sub Title</label>
                <input type="text" name="sub_title" class="w-full border rounded-lg p-2">

                {{-- Number --}}
                <label class="block text-gray-700 font-semibold mt-2">Number</label>
                <input type="text" name="number" class="w-full border rounded-lg p-2">
            </div>          

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2"></textarea>
            </div>

            {{-- Banner Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="banner_image" class="w-full border rounded-lg p-2" accept="image/*">
            </div>

            {{-- About Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">About Image</label>
                <input type="file" name="about_image" class="w-full border rounded-lg p-2" accept="image/*">
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

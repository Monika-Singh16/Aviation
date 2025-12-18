@extends('admin.layout.master')

@section('title', 'Edit about_page Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit About Page Section</h1>

    <form action="{{ route('about_page.update', $about_page->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $about_page->title) }}" 
                        class="w-full border rounded-lg p-2">
            </div>

            {{-- Heading --}}
            <div>
                <label class="block text-gray-700 font-semibold">Heading</label>
                <input type="text"
                        name="heading"
                        value="{{ old('heading', $about_page->heading) }}"
                        class="w-full border rounded-lg p-2">
            </div>

            <div>
                {{-- Sub Title --}}
                <label class="block text-gray-700 font-semibold">Sub Title</label>
                <input type="text" 
                        name="sub_title" 
                        value="{{ old('sub_title', $about_page->sub_title) }}" 
                        class="w-full border rounded-lg p-2">

                {{-- Number --}}
                <label class="block text-gray-700 font-semibold mt-2">Number</label>
                <input type="text" name="number" value="{{ old('number', $about_page->number) }}"
                        class="w-full border rounded-lg p-2">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2">{{ old('description', $about_page->description) }}</textarea>
            </div>

            {{--Banner Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="banner_image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($about_page->banner_image)
                    <img src="{{ asset($about_page->banner_image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner Image">
                @endif
            </div>

            {{--About Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">About Image</label>
                <input type="file" name="about_image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($about_page->about_image)
                    <img src="{{ asset($about_page->about_image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="About Image">
                @endif
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $about_page->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$about_page->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        {{-- Back --}}
        <a href="{{ route('about_page.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>
        {{-- Submit --}}
        <button type="submit" class="bg-green-600 ml-2 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

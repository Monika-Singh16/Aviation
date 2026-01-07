@extends('admin.layout.master')

@section('title', 'Edit Hero Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Hero Banner</h1>

    <form action="{{ route('hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                    name="title" 
                    value="{{ old('title', $hero->title) }}" 
                    class="w-full border rounded-lg p-2" 
                    required>
            </div>

            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Sub Title</label>
                <input type="text" 
                    name="sub_title" 
                    value="{{ old('sub_title', $hero->sub_title) }}" 
                    class="w-full border rounded-lg p-2" 
                    required>
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description', $hero->description) }}</textarea>
            </div>

            {{-- Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($hero->image)
                    <img src="{{ asset($hero->image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner Image">
                @endif
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $hero->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$hero->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

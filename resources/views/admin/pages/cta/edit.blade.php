@extends('admin.layout.master')

@section('title', 'Edit Cta Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Cta Section</h1>

    <form action="{{ route('cta.update', $cta->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $cta->title) }}" 
                        class="w-full border rounded-lg p-2" 
                        required>
            </div>

            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Sub Title</label>
                <input type="text" 
                        name="sub_title" 
                        value="{{ old('sub_title', $cta->sub_title) }}" 
                        class="w-full border rounded-lg p-2" 
                        required>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description', $cta->description) }}</textarea>
            </div>

            {{-- Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($cta->image)
                    <img src="{{ asset($cta->image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner Image">
                @endif
            </div>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Status</label>
            <select name="is_active" class="w-1/2 border rounded-lg p-2">
                <option value="1" {{ $cta->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$cta->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- Back --}}
        <a href="{{ route('cta.index') }}"
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

@extends('admin.layout.master')

@section('title', 'Edit why_choose Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Why Choose Section</h1>

    <form action="{{ route('why_choose.update', $why_choose->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $why_choose->title) }}" 
                        class="w-full border rounded-lg p-2" 
                        required>
            </div>
            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $why_choose->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$why_choose->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description', $why_choose->description) }}</textarea>
            </div>

            {{-- Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($why_choose->image)
                    <img src="{{ asset($why_choose->image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner Image">
                @endif
            </div>
        </div>
        {{-- Back --}}
        <a href="{{ route('why_choose.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>
        {{-- Submit --}}
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white ml-2 px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

@extends('admin.layout.master')

@section('title', 'Edit excellence Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Excellence Section</h1>

    <form action="{{ route('excellence.update', $excellence->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Row 1: Name & Image -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Sub Title</label>
                <input type="text"
                    name="sub_title"
                    value="{{ old('sub_title', $excellence->sub_title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1"> Title</label>
                <input type="text"
                    name="title"
                    value="{{ old('title', $excellence->title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Card Icon --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Card Icon</label>
                <input type="text"
                    name="icon"
                    value="{{ old('icon', $excellence->icon) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            {{-- Card Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Card Title</label>
                <input type="text"
                    name="card_title"
                    value="{{ old('card_title', $excellence->card_title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <!-- Status with top spacing -->
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    <option value="1" {{ $excellence->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$excellence->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Description (Full Width) -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Card Description</label>
                <textarea name="card_description"
                        rows="2"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                        {{ old('card_description', $excellence->card_description) }}</textarea>
            </div>

        </div>

        {{-- Submit and Back--}}
        <a href="{{ route('excellence.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>  
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white ml-3 px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

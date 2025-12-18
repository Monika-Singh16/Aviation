@extends('admin.layout.master')

@section('title', 'Edit career_pilot Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Career Pilot Section</h1>

    <form action="{{ route('career_pilot.update', $career_pilot->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $career_pilot->title) }}" 
                        class="w-full border rounded-lg p-2">
            </div>

            {{-- Card Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card Title</label>
                <input type="text"
                        name="card_title"
                        value="{{ old('card_title', $career_pilot->card_title) }}"
                        class="w-full border rounded-lg p-2">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2">{{ old('description', $career_pilot->description) }}</textarea>
            </div>

            {{-- Card Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card Description</label>
                <textarea name="card_description" rows="4" class="w-full border rounded-lg p-2">{{ old('card_description', $career_pilot->card_description) }}</textarea>
            </div> 

            {{-- Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($career_pilot->image)
                    <img src="{{ asset($career_pilot->image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner Image">
                @endif
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $career_pilot->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$career_pilot->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        {{-- Back --}}
        <a href="{{ route('career_pilot.index') }}"
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

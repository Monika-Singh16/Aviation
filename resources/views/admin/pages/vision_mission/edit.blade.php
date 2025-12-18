@extends('admin.layout.master')

@section('title', 'Edit vision_mission Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Vision Mission Section</h1>

    <form action="{{ route('vision_mission.update', $vision_mission->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $vision_mission->title) }}" 
                        class="w-full border rounded-lg p-2" 
                        required>

                {{-- Status --}}
                <label class="block text-gray-700 font-semibold mb-1 mt-2">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $vision_mission->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$vision_mission->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description', $vision_mission->description) }}</textarea>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                {{-- Card 1 --}}
                <label class="block text-gray-700 font-semibold">Card 1</label>
                <input type="text"
                        name="card_1"
                        value="{{ old('card_1', $vision_mission->card_1) }}"
                        class="w-full border rounded-lg p-2"
                        required>

                {{-- Card 2 --}}
                <label class="block text-gray-700 font-semibold mt-2">Card 2</label>
                <input type="text"
                        name="card_2"
                        value="{{ old('card_2', $vision_mission->card_2) }}"
                        class="w-full border rounded-lg p-2"
                        required>
            </div>
            
            <div>
                {{-- Card 3 --}}
                <label class="block text-gray-700 font-semibold">Card 3</label>
                <input type="text"
                        name="card_3"
                        value="{{ old('card_3', $vision_mission->card_3) }}"
                        class="w-full border rounded-lg p-2"
                        required>

                {{-- Card 4 --}}
                <label class="block text-gray-700 font-semibold mt-2">Card 4</label>
                <input type="text"
                        name="card_4"
                        value="{{ old('card_4', $vision_mission->card_4) }}"
                        class="w-full border rounded-lg p-2"
                        required>
            </div>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-semibold">Banner Image</label>
            <input type="file" name="image" class="w-1/2 border rounded-lg p-2" accept="image/*">

            @if($vision_mission->image)
                <img src="{{ asset($vision_mission->image) }}" 
                    class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                    alt="Banner Image">
            @endif
        </div>

        {{-- Submit and Back--}}
        <a href="{{ route('vision_mission.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white ml-3 px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>
@endsection

@extends('admin.layout.master')

@section('title', 'Add vision_mission Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Vision Mission Section</h1>

    <form action="{{ route('vision_mission.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                {{-- Title --}}
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2" required>
                
                {{-- Image --}}
                <label class="block text-gray-700 font-semibold mt-2">Banner Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2"></textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Card 1 --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card 1</label>
                <input type="text" name="card_1" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Card 2 --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card 2</label>
                <input type="text" name="card_2" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Card 3 --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card 3</label>
                <input type="text" name="card_3" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Card 4 --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card 4</label>
                <input type="text" name="card_4" class="w-full border rounded-lg p-2" required>
            </div>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1 mt-2">Status</label>
                <select name="is_active" class="w-1/2 border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

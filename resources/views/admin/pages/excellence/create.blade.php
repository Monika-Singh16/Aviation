@extends('admin.layout.master')

@section('title', 'Add excellence Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Excellence Section</h1>

    <form action="{{ route('excellence.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Row 1 : Name & Image --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Sub Title</label>
                <input type="text" name="sub_title" class="w-full border rounded-lg p-2">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2">
            </div>

            {{--Icon --}}
            <div>
                <label class="block text-gray-700 font-semibold"> Icon</label>
                <input type="text"
                    name="icon"
                    placeholder="fa-solid fa-plane"
                    class="w-full border rounded-lg p-2">
            </div>

            {{-- Card Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card Title</label>
                <input type="text" name="card_title" class="w-full border rounded-lg p-2">
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card Description</label>
                {{-- <input type="text" name="card_description" class="w-full border rounded-lg p-2"> --}}
                <textarea name="card_description"
                    rows="2"
                    class="w-full border rounded-lg p-2"></textarea>
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>
@endsection

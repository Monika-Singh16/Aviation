@extends('admin.layout.master')

@section('title', 'Add FAQ')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add New FAQ</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="heading" class="block text-gray-700 font-semibold mb-2">Heading</label>
            <input type="text" name="heading" id="heading" value="{{ old('heading') }}" class="w-full border rounded px-3 py-2" placeholder="Optional heading">
        </div>

        <div>
            <label for="question" class="block text-gray-700 font-semibold mb-2">Question</label>
            <input type="text" name="question" id="question" value="{{ old('question') }}" class="w-full border rounded px-3 py-2" required placeholder="Enter frequently asked question">
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded px-3 py-2" placeholder="Optional description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="answer" class="block text-gray-700 font-semibold mb-2">Answer</label>
            <textarea name="answer" id="answer" rows="3" class="w-full border rounded px-3 py-2" required placeholder="Enter answer">{{ old('answer') }}</textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-semibold">Image</label>
            <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">
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
    <button type="submit" class="bg-indigo-600 text-white mt-3 px-6 py-2 rounded hover:bg-indigo-700">Create FAQ</button>
</form>
@endsection

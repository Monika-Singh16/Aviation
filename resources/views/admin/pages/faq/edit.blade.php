@extends('admin.layout.master')

@section('title', 'Edit FAQ')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit FAQ</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="heading" class="block text-gray-700 font-semibold mb-2">Heading</label>
            <input type="text" name="heading" id="heading" value="{{ old('heading', $faq->heading) }}" class="w-full border rounded px-3 py-2" placeholder="Optional heading">
        </div>

        <div>
            <label for="question" class="block text-gray-700 font-semibold mb-2">Question</label>
            <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" class="w-full border rounded px-3 py-2" required placeholder="Enter frequently asked question">
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded px-3 py-2" placeholder="Optional description">{{ old('description', $faq->description) }}</textarea>
        </div>

        <div>
            <label for="answer" class="block text-gray-700 font-semibold mb-2">Answer</label>
            <textarea name="answer" id="answer" rows="3" class="w-full border rounded px-3 py-2" required placeholder="Enter answer">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-semibold">Image</label>
            <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">

            @if($faq->image)
                <img src="{{ asset($faq->image) }}" 
                    class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                    alt="Image">
            @endif
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Status</label>
            <select name="is_active" class="w-full border rounded-lg p-2">
                <option value="1" {{ $faq->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$faq->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    {{-- Back --}}
    <a href="{{ route('faq.index') }}"
        class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
        Back
    </a>
    <button type="submit" class="bg-indigo-600 text-white ml-2 px-6 py-2 rounded-lg hover:bg-indigo-700">Update FAQ</button>
</form>
@endsection

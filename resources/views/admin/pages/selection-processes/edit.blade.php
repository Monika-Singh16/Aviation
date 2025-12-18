@extends('admin.layout.master')
@section('title', 'Edit Selection Process')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Selection Process</h1>

<form action="{{ route('selection_processes.update', $selectionProcess->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Course Selection -->
    <div>
        <label class="block font-semibold mb-1">Course</label>
        <select name="course_id" class="w-full border px-3 py-2 rounded" required>
            <option value="">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $selectionProcess->course_id == $course->id ? 'selected' : '' }}>{{ $course->heading }}</option>
            @endforeach
        </select>
    </div>

    <!-- Heading -->
    <div>
        <label class="block font-semibold mb-1">Heading</label>
        <input type="text" name="heading" value="{{ $selectionProcess->heading }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Description -->
    <div>
        <label class="block font-semibold mb-1">Description</label>
        <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded">{{ $selectionProcess->description }}</textarea>
    </div>

    <!-- Value (JSON) -->
 <!-- Value (JSON) -->
<div>
    <label class="block font-semibold mb-1">Value (JSON)</label>
    <div id="valueContainer">
        @php
            $valueArray = $selectionProcess->value ?? [];
            $index = 0;
        @endphp

        @foreach($valueArray as $index => $item)
            <div class="flex items-center gap-2 mb-2">
                <button type="button" onclick="addValueField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>
                <input type="text" name="value[{{ $index }}][key]" value="{{ $item['key'] ?? '' }}" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
                <input type="text" name="value[{{ $index }}][value]" value="{{ $item['value'] ?? '' }}" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
                <button type="button" onclick="removeValueField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        @endforeach

        @if(empty($valueArray))
            <div class="flex items-center gap-2 mb-2">
                <button type="button" onclick="addValueField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>
                <input type="text" name="value[0][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
                <input type="text" name="value[0][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
                <button type="button" onclick="removeValueField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        @endif
    </div>
</div>


    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update</button>

    <a href="{{ route('selection_processes.index') }}"
   class="mt-6 inline-block bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">
    Back
</a>
</form>

<script>
    let valueIndex = {{ count($valueArray) }};

    function addValueField() {
        const container = document.getElementById('valueContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <button type="button" onclick="addValueField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            <input type="text" name="value[${valueIndex}][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
            <input type="text" name="value[${valueIndex}][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
            <button type="button" onclick="removeValueField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newField);
        valueIndex++;
    }

    function removeValueField(button) {
        const container = document.getElementById('valueContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }
</script>
@endsection

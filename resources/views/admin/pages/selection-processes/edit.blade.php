@extends('admin.layout.master')
@section('title', 'Edit Selection Process')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Selection Process</h1>

<form action="{{ route('selection_processes.update', $selectionProcess->id) }}"
        method="POST"
        class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Course & Heading -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block font-semibold mb-1">Select Course</label>
            <select name="course_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ $selectionProcess->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Heading</label>
            <input type="text"
                    name="heading"
                    value="{{ $selectionProcess->heading }}"
                    class="w-full border px-3 py-2 rounded">
        </div>
    </div>

    <!-- Selection Criteria -->
    <div>
        <label class="block font-semibold mb-2">Selection Criteria</label>

        <div id="criteriaContainer">
            @php
                $criteriaData = $selectionProcess->criteria ?? [];
            @endphp

            @forelse($criteriaData as $index => $criteria)
                <div class="flex items-center gap-2 mb-2">
                    <button type="button" onclick="addRow()"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <input type="text"
                        name="criteria[{{ $index }}][title]"
                        value="{{ $criteria['title'] }}"
                        placeholder="Title"
                        class="border px-3 py-2 rounded w-1/4">

                    <input type="text"
                        name="criteria[{{ $index }}][description]"
                        value="{{ $criteria['description'] }}"
                        placeholder="Description"
                        class="border px-3 py-2 rounded flex-1">

                    <input type="text"
                        name="criteria[{{ $index }}][extra]"
                        value="{{ $criteria['extra'] ?? '' }}"
                        placeholder="Extra"
                        class="border px-3 py-2 rounded w-1/4">

                    <button type="button" onclick="removeRow(this)"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @empty
                <!-- Default Row -->
                <div class="flex items-center gap-2 mb-2">
                    <button type="button" onclick="addRow()"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <input type="text"
                        name="criteria[0][title]"
                        placeholder="Title"
                        class="border px-3 py-2 rounded w-1/4">

                    <input type="text"
                        name="criteria[0][description]"
                        placeholder="Description"
                        class="border px-3 py-2 rounded flex-1">

                    <input type="text"
                        name="criteria[0][extra]"
                        placeholder="Extra"
                        class="border px-3 py-2 rounded w-1/4">

                    <button type="button" onclick="removeRow(this)"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Status & Note -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="is_active" class="w-full border px-3 py-2 rounded">
                <option value="1" {{ $selectionProcess->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$selectionProcess->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Footer Note</label>
            <input type="text"
                    name="note"
                    value="{{ $selectionProcess->note }}"
                    class="w-full border px-3 py-2 rounded">
        </div>
    </div>

    <!-- Buttons -->
    <div class="flex gap-4">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Update
        </button>

        <a href="{{ route('selection_processes.index') }}"
            class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">
            Back
        </a>
    </div>
</form>

<script>
    let index = {{ count($criteriaData) }};

    function addRow() {
        const container = document.getElementById('criteriaContainer');

        const row = document.createElement('div');
        row.className = 'flex items-center gap-2 mb-2';

        row.innerHTML = `
            <button type="button" onclick="addRow()"
                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>

            <input type="text"
                name="criteria[${index}][title]"
                placeholder="Title"
                class="border px-3 py-2 rounded w-1/4"
                required>

            <input type="text"
                name="criteria[${index}][description]"
                placeholder="Description"
                class="border px-3 py-2 rounded flex-1"
                required>

            <input type="text"
                name="criteria[${index}][extra]"
                placeholder="Extra"
                class="border px-3 py-2 rounded w-1/4">

            <button type="button" onclick="removeRow(this)"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;

        container.appendChild(row);
        index++;
    }

    function removeRow(button) {
        const container = document.getElementById('criteriaContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }
</script>
@endsection

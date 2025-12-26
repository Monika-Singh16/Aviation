@extends('admin.layout.master')
@section('title', 'Add Selection Process')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add Selection Process</h1>

<form action="{{ route('selection_processes.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Course Selection -->
        <div>
            <label class="block font-semibold mb-1">Select Course</label>
            <select name="course_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Heading -->
        <div>
            <label class="block font-semibold mb-1">Heading</label>
            <input type="text" name="heading"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. Selection Process">
        </div>
    </div>

    <!-- Criteria (3 Fields Repeater) -->
    <div>
        <label class="block font-semibold mb-2">Selection Criteria</label>

        <div id="criteriaContainer">
            <div class="flex items-center gap-2 mb-2">
                <button type="button" onclick="addRow()"
                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>

                <input type="text"
                    name="criteria[0][title]"
                    placeholder="Title"
                    class="border px-3 py-2 rounded w-1/4"
                    required>

                <input type="text"
                    name="criteria[0][description]"
                    placeholder="Description"
                    class="border px-3 py-2 rounded flex-1"
                    required>

                <input type="text"
                    name="criteria[0][extra]"
                    placeholder="Extra"
                    class="border px-3 py-2 rounded w-1/4">

                <button type="button" onclick="removeRow(this)"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Status -->
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="is_active" class="w-full border px-3 py-2 rounded">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <!-- Note -->
        <div>
            <label class="block font-semibold mb-1">Footer Note</label>
            <input type="text"
                    name="note"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="Any additional note">
        </div>
    </div>

    <!-- Submit -->
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Save 
    </button>
</form>

<script>
    let index = 1;

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
                placeholder="Stage Title"
                class="border px-3 py-2 rounded w-1/4"
                required>

            <input type="text"
                name="criteria[${index}][description]"
                placeholder="Description"
                class="border px-3 py-2 rounded flex-1"
                required>

            <input type="text"
                name="criteria[${index}][extra]"
                placeholder="Extra Info (Fee / Mode)"
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

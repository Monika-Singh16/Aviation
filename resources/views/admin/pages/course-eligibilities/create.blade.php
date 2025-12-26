@extends('admin.layout.master')
@section('title', 'Add Course Eligibility')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add Course Eligibility</h1>

<form action="{{ route('course_eligibilities.store') }}" method="POST" class="space-y-6">
    @csrf

    <!-- Course Selection -->
    <div>
        <label class="block font-semibold mb-1">Select Course</label>
        <select name="course_id" class="w-full border px-3 py-2 rounded">
            <option value="">-- Select Course --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Eligibility Criteria (Repeater) -->
    <div>
        <label class="block font-semibold mb-2">Eligibility Criteria</label>

        <div id="eligibilityContainer">
            <div class="flex items-center gap-2 mb-2">
                <button type="button" onclick="addRow(this)"
                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>

                <input
                    type="text"
                    name="eligibilities[0][label]"
                    placeholder="Label"
                    class="border px-3 py-2 rounded w-1/3">

                <input
                    type="text"
                    name="eligibilities[0][value]"
                    placeholder="Eligibility description"
                    class="border px-3 py-2 rounded flex-1">

                <button type="button" onclick="removeRow(this)"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Status --}}
    <div>
        <label class="block text-gray-700 font-semibold mb-1">Status</label>
        <select name="is_active" class="w-1/2 border rounded-lg p-2">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <!-- Submit -->
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Save Eligibility
    </button>
</form>

<script>
    let index = 1;

    function addRow() {
        const container = document.getElementById('eligibilityContainer');

        const row = document.createElement('div');
        row.className = 'flex items-center gap-2 mb-2';

        row.innerHTML = `

            <button type="button" onclick="addRow(this)"
                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            
            <input
                type="text"
                name="eligibilities[${index}][label]"
                placeholder="Label"
                class="border px-3 py-2 rounded w-1/3"
            >

            <input
                type="text"
                name="eligibilities[${index}][value]"
                placeholder="Eligibility description"
                class="border px-3 py-2 rounded flex-1"
                required
            >

            <button type="button" onclick="removeRow(this)"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;

        container.appendChild(row);
        index++;
    }

    function removeRow(button) {
        const container = document.getElementById('eligibilityContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }
</script>
@endsection

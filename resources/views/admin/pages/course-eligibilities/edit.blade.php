@extends('admin.layout.master')
@section('title', 'Edit Course Eligibility')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Course Eligibility</h1>

<form action="{{ route('course_eligibilities.update', $courseEligibility->id) }}"
        method="POST"
        class="space-y-6 bg-white p-6 rounded">

    @csrf
    @method('PUT')

    <!-- Course Selection -->
    <div>
        <label class="block font-semibold mb-1">Course</label>
        <select name="course_id" class="w-full border px-3 py-2 rounded" required>
            <option value="">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}"
                    {{ $courseEligibility->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->course_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Status -->
    <div>
        <label class="block font-semibold mb-1">Status</label>
        <select name="is_active" class="w-full border px-3 py-2 rounded">
            <option value="1" {{ $courseEligibility->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$courseEligibility->is_active ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <!-- Eligibility Criteria -->
    <div>
        <label class="block font-semibold mb-2">Eligibility Criteria</label>

        <div id="eligibilityContainer">
            @foreach($courseEligibility->eligibilities as $index => $item)
                <div class="flex gap-2 mb-2">
                    <button type="button"
                            onclick="addRow()"
                            class="bg-green-500 hover:bg-green-600 text-white px-3 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <input type="text"
                            name="eligibilities[{{ $index }}][label]"
                            value="{{ $item['label'] }}"
                            placeholder="Label (e.g. Education)"
                            class="border px-3 py-2 rounded w-1/3">

                    <input type="text"
                            name="eligibilities[{{ $index }}][value]"
                            value="{{ $item['value'] }}"
                            placeholder="Value"
                            class="border px-3 py-2 rounded w-2/3">

                    <button type="button"
                            onclick="removeRow(this)"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforeach
        </div>

    </div>

    <!-- Buttons -->
    <div class="flex gap-3">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Update
        </button>

        <a href="{{ route('course_eligibilities.index') }}"
            class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">
            Back
        </a>
    </div>

</form>

<script>
    let index = {{ count($courseEligibility->eligibilities) }};

    function addRow() {
        const container = document.getElementById('eligibilityContainer');

        const div = document.createElement('div');
        div.className = 'flex gap-2 mb-2';
        div.innerHTML = `
            <button type="button"
                    onclick="addRow(this)"
                    class="bg-green-500 hover:bg-green-600 text-white px-3 rounded">
                <i class="fas fa-plus"></i>
            </button>

            <input type="text"
                    name="eligibilities[${index}][label]"
                    placeholder="Label"
                    class="border px-3 py-2 rounded w-1/3">

            <input type="text"
                    name="eligibilities[${index}][value]"
                    placeholder="Value"
                    class="border px-3 py-2 rounded w-2/3">

            <button type="button"
                    onclick="removeRow(this)"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(div);
        index++;
    }

    function removeRow(btn) {
        btn.parentElement.remove();
    }
</script>
@endsection

@extends('admin.layout.master')

@section('title', 'Add record Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Record Section</h1>

    <form action="{{ route('record.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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

            {{--  Icon --}}
            <div>
                <label class="block text-gray-700 font-semibold"> Icon</label>
                <input type="text"
                    name="icon"
                    placeholder="fa-solid fa-plane"
                    class="w-full border rounded-lg p-2">
            </div>

            <!-- Features -->
            <div>
                <label class="block font-semibold mb-1">Features</label>

                <div id="valueContainer">
                    <div class="flex items-center gap-2 mb-2">
                        <input type="text"
                            name="text[0][key]"
                            placeholder="Key"
                            class="border px-3 py-2 rounded w-1/3">

                        <input type="text"
                            name="text[0][value]"
                            placeholder="Value"
                            class="border px-3 py-2 rounded flex-1">
                    </div>
                </div>
            </div>

            <div>
                {{-- Status --}}
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Save
        </button>
    </form>
</div>

<script>
    let valueIndex = 1;

    function addValueField() {
        const container = document.getElementById('valueContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <input type="text"
                name="text[${valueIndex}][key]"
                placeholder="Key"
                class="border px-3 py-2 rounded w-1/3">

            <input type="text"
                name="text[${valueIndex}][value]"
                placeholder="Value"
                class="border px-3 py-2 rounded flex-1">
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

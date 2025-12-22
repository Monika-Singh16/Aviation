@extends('admin.layout.master')

@section('title', 'Edit record Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Record Section</h1>

    <form action="{{ route('record.update', $record->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Row 1: Name & Image -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Sub Title</label>
                <input type="text"
                    name="sub_title"
                    value="{{ old('sub_title', $record->sub_title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1"> Title</label>
                <input type="text"
                    name="title"
                    value="{{ old('title', $record->title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Icon --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Icon</label>
                <input type="text"
                    name="icon"
                    value="{{ old('icon', $record->icon) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            <div>
                <!-- Status with top spacing -->
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    <option value="1" {{ $record->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$record->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Features -->
            <div>
                <label class="block font-semibold mb-1">Features</label>
                <div id="valueContainer">
                    @php $index = 0; @endphp

                    @foreach($record->text ?? [] as $key => $value)
                        <div class="flex items-center gap-2 mb-2">
                            <input type="text"
                                name="text[{{ $index }}][key]"
                                value="{{ $key }}"
                                placeholder="Key"
                                class="border px-3 py-2 rounded w-1/3">

                            <input type="text"
                                name="text[{{ $index }}][value]"
                                value="{{ $value }}"
                                placeholder="Value"
                                class="border px-3 py-2 rounded flex-1">
                        </div>
                        @php $index++; @endphp
                    @endforeach
                    @if(empty($record->text))
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
                    @endif

                </div>
            </div>

        </div>

        {{-- Submit and Back--}}
        <a href="{{ route('record.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>  
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white ml-3 px-6 py-2 rounded-lg">
            Update
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

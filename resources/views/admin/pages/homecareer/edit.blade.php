@extends('admin.layout.master')

@section('title', 'Edit Home Career')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Home Career</h1>

<form method="POST" action="{{ route('homecareer.update', $homeCareer->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="heading" class="block text-gray-700 font-medium mb-2">Heading</label>
        <input type="text" name="heading" id="heading" value="{{ old('heading', $homeCareer->heading) }}" class="w-full px-3 py-2 border rounded">
        @error('heading')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
        <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded">{{ old('description', $homeCareer->description) }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-medium mb-2">Labels and Values</label>
        <div id="fieldsContainer">
            @php
                $labels = old('label', $homeCareer->label ?? ['']);
                $values = old('value', $homeCareer->value ?? ['']);
            @endphp
            @foreach ($labels as $i => $label)
            <div class="flex space-x-4 mb-4" id="fieldRow{{ $i }}">
                <textarea name="label[]" placeholder="Label" rows="3" class="flex-1 px-3 py-2 border rounded">{{ $label }}</textarea>
                <textarea name="value[]" placeholder="Value" rows="3" class="flex-1 px-3 py-2 border rounded">{{ $values[$i] ?? '' }}</textarea>
                @if ($i == 0)
                <div class="flex flex-col space-y-2">
                    <button type="button" id="addFieldBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" id="removeFieldBtn" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                @else
                <div class="flex flex-col space-y-2 hidden"></div>
                @endif
            </div>
            @endforeach
        </div>
        @error('label')
            <p class="text-red-500 text-sm mt-1">Label field is required.</p>
        @enderror
        @error('value')
            <p class="text-red-500 text-sm mt-1">Value field is required.</p>
        @enderror
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update Home Career</button>
    <a href="{{ route('homecareer.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
</form>

<script>
    const addBtn = document.getElementById('addFieldBtn');
    const removeBtn = document.getElementById('removeFieldBtn');
    const fieldsContainer = document.getElementById('fieldsContainer');

    addBtn.addEventListener('click', () => {
        let index = fieldsContainer.children.length;
        const newFieldRow = document.createElement('div');
        newFieldRow.className = 'flex space-x-4 mb-4';
        newFieldRow.id = `fieldRow${index}`;
        newFieldRow.innerHTML = `
            <textarea name="label[]" placeholder="Label" rows="3" class="flex-1 px-3 py-2 border rounded"></textarea>
            <textarea name="value[]" placeholder="Value" rows="3" class="flex-1 px-3 py-2 border rounded"></textarea>
            <div class="flex flex-col space-y-2">
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded addBtn">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded removeBtn">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        `;
        fieldsContainer.appendChild(newFieldRow);

        // Add event listeners to new buttons
        newFieldRow.querySelector('.addBtn').addEventListener('click', () => addBtn.click());
        newFieldRow.querySelector('.removeBtn').addEventListener('click', () => removeBtn.click());
    });

    removeBtn.addEventListener('click', () => {
        if (fieldsContainer.children.length > 1) {
            fieldsContainer.removeChild(fieldsContainer.lastChild);
        }
    });
</script>
@endsection

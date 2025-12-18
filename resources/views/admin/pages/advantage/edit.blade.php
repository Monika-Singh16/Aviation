@extends('admin.layout.master')

@section('title', 'Edit Advantage')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Advantage</h1>

    <form action="{{ route('advantage.update', $advantage->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{--Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Sub Title</label>
                <input type="text" 
                        name="sub_title" 
                        value="{{ old('sub_title', $advantage->sub_title) }}" 
                        class="w-full border rounded-lg p-2">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" 
                        name="title" 
                        value="{{ old('title', $advantage->title) }}" 
                        class="w-full border rounded-lg p-2">
            </div>

            {{--Short Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Short Description</label>
                <textarea name="short_description" rows="4" class="w-full border rounded-lg p-2">{{ old('short_description', $advantage->short_description) }}</textarea>
            </div>

            {{--Banner Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Banner Image</label>
                <input type="file" name="banner_image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($advantage->banner_image)
                    <img src="{{ asset($advantage->banner_image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Banner Image">
                @endif
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $advantage->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$advantage->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Ratings (JSON) -->
            <div>
                <label class="block font-semibold mb-1">Ratings</label>
                <div id="valueContainer">
                    @php $index = 0; @endphp

                    @foreach($advantage->ratings ?? [] as $key => $value)
                        <div class="flex items-center gap-2 mb-2">
                            <button type="button" onclick="addValueField()" class="bg-green-500 text-white px-3 py-2 rounded">
                                +
                            </button>

                            <input type="text" name="ratings[{{ $index }}][key]"
                                value="{{ $key }}"
                                class="border px-3 py-2 rounded flex-1" required>

                            <input type="text" name="ratings[{{ $index }}][value]"
                                value="{{ $value }}"
                                class="border px-3 py-2 rounded flex-1" required>

                            <button type="button" onclick="removeValueField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                                −
                            </button>
                        </div>
                        @php $index++; @endphp
                    @endforeach

                    @if(empty($advantage->ratings))
                        <div class="flex items-center gap-2 mb-2">
                            <button type="button" onclick="addValueField()" class="bg-green-500 text-white px-3 py-2 rounded">+</button>
                            <input type="text" name="ratings[0][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1">
                            <input type="text" name="ratings[0][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1">
                            <button type="button" onclick="removeValueField(this)" class="bg-red-500 text-white px-3 py-2 rounded">−</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Back --}}
        <a href="{{ route('advantage.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>
        {{-- Submit --}}
        <button type="submit" class="bg-green-600 ml-2 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
            Update
        </button>
    </form>
</div>

<script>
    let valueIndex = {{ count($advantage->ratings ?? []) }};
    
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

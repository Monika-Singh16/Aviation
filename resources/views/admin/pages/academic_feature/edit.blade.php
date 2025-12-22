@extends('admin.layout.master')

@section('title', 'Edit Academic Feature Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Academic Feature Section</h1>

    <form action="{{ route('academic_feature.update', $academic_feature->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Heading</label>
                <input type="text" name="sub_title"
                    value="{{ old('sub_title', $academic_feature->sub_title) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title"
                    value="{{ old('title', $academic_feature->title) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Vihanga Aviation Academy</label>
                <select name="vihanga_type" id="vihanga_type"
                    class="w-full border rounded p-2">
                    <option value="boolean" {{ $academic_feature->vihanga_type === 'boolean' ? 'selected' : '' }}>
                        Yes / No
                    </option>
                    <option value="text" {{ $academic_feature->vihanga_type === 'text' ? 'selected' : '' }}>
                        Text
                    </option>
                </select>
            </div>

            {{-- Boolean --}}
            <div id="vihanga_boolean"
                class="{{ $academic_feature->vihanga_type === 'text' ? 'hidden' : '' }}">
                <label class="block text-gray-700 font-semibold mb-1">Value</label>
                <select name="vihanga_bool" class="w-full border rounded p-2">
                    <option value="1" {{ $academic_feature->vihanga_bool ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$academic_feature->vihanga_bool ? 'selected' : '' }}>No</option>
                </select>
            </div>

            {{-- Text --}}
            <div id="vihanga_text"
                class="{{ $academic_feature->vihanga_type === 'boolean' ? 'hidden' : '' }}">
                <label class="block text-gray-700 font-semibold mb-1">Text Value</label>
                <input type="text" name="vihanga_text"
                    value="{{ old('vihanga_text', $academic_feature->vihanga_text) }}"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Other Academics</label>
                <select name="other_type" id="other_type"
                    class="w-full border rounded p-2">
                    <option value="boolean" {{ $academic_feature->other_type === 'boolean' ? 'selected' : '' }}>
                        Yes / No
                    </option>
                    <option value="text" {{ $academic_feature->other_type === 'text' ? 'selected' : '' }}>
                        Text
                    </option>
                </select>
            </div>

            {{-- Boolean --}}
            <div id="other_boolean"
                class="{{ $academic_feature->other_type === 'text' ? 'hidden' : '' }}">
                <label class="block text-gray-700 font-semibold mb-1">Value</label>
                <select name="other_bool" class="w-full border rounded p-2">
                    <option value="1" {{ $academic_feature->other_bool ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$academic_feature->other_bool ? 'selected' : '' }}>No</option>
                </select>
            </div>

            {{-- Text --}}
            <div id="other_text"
                class="{{ $academic_feature->other_type === 'boolean' ? 'hidden' : '' }}">
                <label class="block text-gray-700 font-semibold mb-1">Text Value</label>
                <input type="text" name="other_text"
                    value="{{ old('other_text', $academic_feature->other_text) }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $academic_feature->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$academic_feature->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>

        {{-- Submit --}}
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>

<script>
    function toggleVihanga() {
        const type = document.getElementById('vihanga_type').value;
        document.getElementById('vihanga_boolean').classList.toggle('hidden', type === 'text');
        document.getElementById('vihanga_text').classList.toggle('hidden', type === 'boolean');
    }

    function toggleOther() {
        const type = document.getElementById('other_type').value;
        document.getElementById('other_boolean').classList.toggle('hidden', type === 'text');
        document.getElementById('other_text').classList.toggle('hidden', type === 'boolean');
    }

    document.getElementById('vihanga_type').addEventListener('change', toggleVihanga);
    document.getElementById('other_type').addEventListener('change', toggleOther);
</script>
@endsection

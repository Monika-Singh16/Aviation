@extends('admin.layout.master')

@section('title', 'Add academic_feature Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Academic Feature Section</h1>

    <form action="{{ route('academic_feature.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Row 1 : Name & Image --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Heading</label>
                <input type="text" name="sub_title" class="w-full border rounded-lg p-2">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2">
            </div>

            {{-- Type --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Vihanga Aviation Academy</label>
                <select name="vihanga_type" id="vihanga_type" class="w-full border rounded p-2">
                    <option value="boolean">Yes / No</option>
                    <option value="text">Text</option>
                </select>
            </div>

            {{-- Boolean --}}
            <div class="mb-4" id="vihanga_boolean">
                <label class="block font-semibold mb-1">Value</label>
                <select name="vihanga_bool" class="w-full border rounded p-2">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            {{-- Text --}}
            <div class="mb-4 hidden" id="vihanga_text">
                <label class="block font-semibold mb-1">Text Value</label>
                <input type="text" name="vihanga_text" class="w-full border rounded p-2" placeholder="e.g. 95%">
            </div>

            {{-- Type --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Other Academics</label>
                <select name="other_type" id="other_type" class="w-full border rounded p-2">
                    <option value="boolean">Yes / No</option>
                    <option value="text">Text</option>
                </select>
            </div>

            {{-- Boolean --}}
            <div class="mb-4" id="other_boolean">
                <label class="block font-semibold mb-1">Value</label>
                <select name="other_bool" class="w-full border rounded p-2">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            {{-- Text --}}
            <div class="mb-4 hidden" id="other_text">
                <label class="block font-semibold mb-1">Text Value</label>
                <input type="text" name="other_text" class="w-full border rounded p-2" placeholder="e.g. 70–80%">
            </div>

            {{-- Status --}}
            <div>
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

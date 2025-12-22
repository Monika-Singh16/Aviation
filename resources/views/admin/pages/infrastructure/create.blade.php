@extends('admin.layout.master')

@section('title', 'Add infrastructure Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Infrastructure Section</h1>

    <form action="{{ route('infrastructure.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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

            {{-- Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Image</label>
                <input type="file" name="infrastructure_image" class="w-full border rounded-lg p-2" accept="image/*">
            </div>

            {{-- Infrastructure Icon --}}
            <div>
                <label class="block text-gray-700 font-semibold"> Icon</label>
                <input type="text"
                    name="infrastructure_icon"
                    placeholder="fa-solid fa-plane"
                    class="w-full border rounded-lg p-2">
            </div>

            <div>
                {{-- Infrastructure Title --}}
                <label class="block text-gray-700 font-semibold">Card Title</label>
                <input type="text" name="infrastructure_title" class="w-full border rounded-lg p-2">

                {{-- Status --}}
                <label class="block text-gray-700 font-semibold mb-1 mt-4">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            {{--Infrastructure Description --}}
            <div>
                <label class="block text-gray-700 font-semibold">Card Description</label>
                <textarea name="infrastructure_description"
                    rows="3"
                    class="w-full border rounded-lg p-2"></textarea>

                <!-- Features (JSON) -->
                <label class="block font-semibold mb-1 mt-4">Features (JSON)</label>
                <div id="valueContainer">
                    <div class="flex items-center gap-2 mb-2">
                        <button type="button" onclick="addValueField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-plus"></i>
                        </button>
                        <input type="text" name="features[]" placeholder="Enter Feature" class="border px-3 py-2 rounded flex-1" >
                        <button type="button" onclick="removeValueField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
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

        const div = document.createElement('div');
        div.className = 'flex items-center gap-2 mb-2';

        div.innerHTML = `
            <button type="button"
                    onclick="addValueField(this)"
                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            
            <input type="text"
                name="features[]"
                placeholder="Enter feature"
                class="border px-3 py-2 rounded flex-1">

            <button type="button"
                    onclick="removeValueField(this)"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;

        container.appendChild(div);
    }

    function removeValueField(button) {
        const container = document.getElementById('valueContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }
</script>
@endsection

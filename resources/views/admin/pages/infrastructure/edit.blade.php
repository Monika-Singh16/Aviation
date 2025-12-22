@extends('admin.layout.master')

@section('title', 'Edit infrastructure Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Infrastructure Section</h1>

    <form action="{{ route('infrastructure.update', $infrastructure->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Row 1: Name & Image -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Sub Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Sub Title</label>
                <input type="text"
                    name="sub_title"
                    value="{{ old('sub_title', $infrastructure->sub_title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1"> Title</label>
                <input type="text"
                    name="title"
                    value="{{ old('title', $infrastructure->title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Infrastructure Icon --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Icon</label>
                <input type="text"
                    name="infrastructure_icon"
                    value="{{ old('infrastructure_icon', $infrastructure->infrastructure_icon) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            {{-- infrastructure Title --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Card Title</label>
                <input type="text"
                    name="infrastructure_title"
                    value="{{ old('infrastructure_title', $infrastructure->infrastructure_title) }}"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Description (Full Width) -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Card Description</label>
                <textarea name="infrastructure_description"
                        rows="4"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                        {{ old('infrastructure_description', $infrastructure->infrastructure_description) }}</textarea>
            </div>

            {{--Image --}}
            <div>
                <label class="block text-gray-700 font-semibold">Image</label>
                <input type="file" name="infrastructure_image" class="w-full border rounded-lg p-2" accept="image/*">

                @if($infrastructure->infrastructure_image)
                    <img src="{{ asset($infrastructure->infrastructure_image) }}" 
                        class="mt-3 w-32 h-20 object-cover rounded-lg border" 
                        alt="Image">
                @endif
            </div>

            <div>
                <!-- Status with top spacing -->
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    <option value="1" {{ $infrastructure->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$infrastructure->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Features -->
            <div>
                <label class="block font-semibold mb-1">Features</label>

                <div id="valueContainer">
                    @if(!empty($infrastructure->features))
                        @foreach($infrastructure->features as $index => $feature)
                            <div class="flex items-center gap-2 mb-2">
                                <button type="button" onclick="addValueField()" class="bg-green-500 text-white px-3 py-2 rounded">
                                    +
                                </button>

                                <input type="text"
                                    name="features[]"
                                    value="{{ $feature }}"
                                    class="border px-3 py-2 rounded flex-1">

                                <button type="button" onclick="removeValueField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                                    −
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center gap-2 mb-2">
                            <button type="button" onclick="addValueField()" class="bg-green-500 text-white px-3 py-2 rounded">+</button>
                            <input type="text" name="features[]" placeholder="Enter Feature" class="border px-3 py-2 rounded flex-1">
                            <button type="button" onclick="removeValueField(this)" class="bg-red-500 text-white px-3 py-2 rounded">−</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Submit and Back--}}
        <a href="{{ route('infrastructure.index') }}" 
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
            Back
        </a>  
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white ml-3 px-6 py-2 rounded-lg">
            Update
        </button>

    </form>
</div>

<script>
function addValueField() {
    const container = document.getElementById('valueContainer');

    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 mb-2';

    div.innerHTML = `
        <button type="button" onclick="addValueField()" class="bg-green-500 text-white px-3 py-2 rounded">+</button>
        <input type="text" name="features[]" placeholder="Enter Feature" class="border px-3 py-2 rounded flex-1">
        <button type="button" onclick="removeValueField(this)" class="bg-red-500 text-white px-3 py-2 rounded">−</button>
    `;

    container.appendChild(div);
}

function removeValueField(btn) {
    const container = document.getElementById('valueContainer');
    if (container.children.length > 1) {
        btn.parentElement.remove();
    }
}
</script>
@endsection

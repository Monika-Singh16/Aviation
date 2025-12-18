@extends('admin.layout.master')

@section('title', 'Add Highlight')

@section('content')
<div class="p-5 bg-white ">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Add Highlight</h1>

    <form action="{{ route('highlights.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-bold mb-1">Icon</label>
                <input type="text" name="icon" class="w-full border rounded-lg p-2" placeholder="e.g. fa-solid fa-star">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-1">Heading</label>
                <input type="text" name="heading" class="w-full border rounded-lg p-2" placeholder="Enter main heading (e.g. Why Choose Us)" required>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-bold mb-1">Sub Heading</label>
                <input type="text" name="sub_heading" class="w-full border rounded-lg p-2" placeholder="Enter sub-heading ">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-1">Short Description</label>
                <textarea name="short_description" rows="3" class="w-full border rounded-lg p-2" placeholder="Write a short summary or tagline" required></textarea>
            </div>
        </div>

        <!-- Row 3: Label/Value -->
        <div>
            <label class="block text-gray-700 font-bold mb-2">Labels and Values</label>
            <div id="labelContainer" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="label[]" class="border rounded-lg p-2 w-1/3" placeholder="e.g. Projects Done">
                    <input type="text" name="value[]" class="border rounded-lg p-2 w-1/3" placeholder="e.g. 250+">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg add-label">+</button>
                </div>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-bold mb-1">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2" placeholder="Enter highlight title (e.g. Our Expertise)" required>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-1">Sub Title</label>
                <input type="text" name="sub_title" class="w-full border rounded-lg p-2" placeholder="Enter sub-title ">
            </div>
        </div>

        <!-- Row 5: Image + Color -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-bold mb-1">Image</label>
                <input type="file" name="image" id="imageInput" class="w-full border rounded-lg p-2" accept="image/*" required>
                <small class="text-gray-500">Upload a high-quality image (PNG/JPG/WebP)</small>
                <div class="mt-3">
                    <img id="imagePreview" src="#" alt="Preview" class="hidden w-32 h-32 object-cover rounded-lg border">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-1">Icon Background Color</label>
                <input type="color" name="color" class="w-16 h-10 border rounded-lg p-1" required>
                <small class="text-gray-500 block mt-1">Pick a background color for the icon</small>
            </div>
        </div>

        <!-- Row 6: Description -->
        <div>
            <label class="block text-gray-700 font-bold mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg p-2" placeholder="Write a detailed description about this highlight" required></textarea>
        </div>

        <!-- Row 7: Additional Label / Value -->
        <div>
            <label class="block text-gray-700 font-bold mb-2">Additional Labels and Values</label>
            <div id="labelContainer1" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="label_1[]" class="border rounded-lg p-2 w-1/3" placeholder="e.g. Clients Served">
                    <input type="text" name="value_1[]" class="border rounded-lg p-2 w-1/3" placeholder="e.g. 120+">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg add-label1">+</button>
                </div>
            </div>
        </div>

        <!-- Row 8: Features -->
        <div>
            <label class="block text-gray-700 font-bold mb-2">Features</label>
            <div id="featureContainer" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="features[]" class="w-1/2 border rounded-lg p-2" placeholder="e.g. Fast Delivery or 24/7 Support">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg add-feature">+</button>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="pt-4 text-right">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Save Highlight
            </button>
        </div>
    </form>
</div>

{{-- JS --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Add & Remove Label Rows
    const addRow = (containerId, addClass, labelName, valueName) => {
        const container = document.getElementById(containerId);
        container.addEventListener('click', e => {
            if (e.target.classList.contains(addClass)) {
                e.preventDefault();
                const newRow = document.createElement('div');
                newRow.className = 'flex gap-2';
                newRow.innerHTML = `
                    <input type="text" name="${labelName}[]" class="border rounded-lg p-2 w-1/3" placeholder="Label">
                    <input type="text" name="${valueName}[]" class="border rounded-lg p-2 w-1/3" placeholder="Value">
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg remove-row">−</button>`;
                container.appendChild(newRow);
            }
        });
        container.addEventListener('click', e => {
            if (e.target.classList.contains('remove-row')) {
                e.preventDefault();
                e.target.closest('div').remove();
            }
        });
    };
    addRow('labelContainer', 'add-label', 'label', 'value');
    addRow('labelContainer1', 'add-label1', 'label_1', 'value_1');

    // Add & Remove Features
    const featureContainer = document.getElementById('featureContainer');
    featureContainer.addEventListener('click', e => {
        if (e.target.classList.contains('add-feature')) {
            e.preventDefault();
            const newFeature = document.createElement('div');
            newFeature.className = 'flex gap-2';
            newFeature.innerHTML = `
                <input type="text" name="features[]" class="w-1/2 border rounded-lg p-2" placeholder="Enter another feature">
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg remove-feature">−</button>`;
            featureContainer.appendChild(newFeature);
        }
        if (e.target.classList.contains('remove-feature')) {
            e.preventDefault();
            e.target.closest('div').remove();
        }
    });

    // Image Preview
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    imageInput.addEventListener('change', event => {
        const file = event.target.files[0];
        if (file) {
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.classList.remove('hidden');
        } else {
            imagePreview.src = '#';
            imagePreview.classList.add('hidden');
        }
    });
});
</script>
@endsection

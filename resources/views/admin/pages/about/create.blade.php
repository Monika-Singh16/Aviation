@extends('admin.layout.master')

@section('title', 'Add About Section')

@section('content')
<div class="p-6 bg-white ">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add About Section</h1>

    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold">Title</label>
            <input type="text" name="title" class="w-1/2 border rounded-lg p-2" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Subtitle</label>
            <input type="text" name="sub_title" class="w-1/2 border rounded-lg p-2">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Description 1</label>
            <textarea name="description_1" class="w-1/2 border rounded-lg p-2" rows="4" required></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Description 2 (Optional)</label>
            <textarea name="description_2" class="w-1/2 border rounded-lg p-2" rows="4"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Main Image</label>
            <input type="file" name="image" class="w-1/2 border rounded-lg p-2" accept="image/*" required>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold">Image One</label>
                <input type="file" name="image_one" class="w-1/2 border rounded-lg p-2" accept="image/*">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Image Two</label>
                <input type="file" name="image_two" class="w-1/2 border rounded-lg p-2" accept="image/*">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Image Three</label>
                <input type="file" name="image_three" class="w-1/2 border rounded-lg p-2" accept="image/*">
            </div>
        </div>

        {{-- Dynamic Features --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Features (Bullet Points)</label>
            <div id="featureContainer" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="features[]" class="w-1/2 border rounded-lg p-2" placeholder="Enter a feature">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg add-feature">+</button>
                </div>
            </div>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Save</button>
    </form>
</div>

{{-- Feature Field Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('featureContainer');

    container.addEventListener('click', function (e) {
        if (e.target.classList.contains('add-feature')) {
            e.preventDefault();
            const newFeature = document.createElement('div');
            newFeature.className = 'flex gap-2';
            newFeature.innerHTML = `
                <input type="text" name="features[]" class="w-1/2 border rounded-lg p-2" placeholder="Enter a feature">
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg remove-feature">−</button>
            `;
            container.appendChild(newFeature);
        }

        if (e.target.classList.contains('remove-feature')) {
            e.preventDefault();
            e.target.closest('div').remove();
        }
    });
});
</script>
@endsection

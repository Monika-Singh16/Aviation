@extends('admin.layout.master')

@section('title', 'Add About Section')

@section('content')
<div class="p-6 bg-white ">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add About Section</h1>

    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold">Subtitle</label>
                <input type="text" name="sub_title" class="w-full border rounded-lg p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-2" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" class="w-full border rounded-lg p-2" rows="4" required></textarea>
            </div>
            <div>
                <div>
                    <label class="block text-gray-700 font-semibold">Image One</label>
                    <input type="file" name="image_one" class="w-full border rounded-lg p-2" accept="image/*">
                </div>
                
                <div>
                    <label class="block text-gray-700 font-semibold mt-3">Image Two</label>
                    <input type="file" name="image_two" class="w-full border rounded-lg p-2" accept="image/*">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Features (Bullet Points)</label>
                <div id="featureContainer" class="space-y-2">
                    <div class="flex gap-2 feature-row">
                        <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg add-feature">+</button>
                        <input type="text" name="features[]" class="w-full border rounded-lg p-2" placeholder="Enter a feature">
                        <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg remove-feature">−</button>
                    </div>
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

        // ADD FEATURE
        if (e.target.classList.contains('add-feature')) {
            e.preventDefault();

            const newFeature = document.createElement('div');
            newFeature.className = 'flex gap-2 feature-row';

            newFeature.innerHTML = `
                <button type="button"
                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg add-feature">+</button>

                <input type="text" name="features[]"
                    class="w-full border rounded-lg p-2"
                    placeholder="Enter a feature" required>

                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg remove-feature">−</button>
            `;

            container.appendChild(newFeature);
        }

        // REMOVE FEATURE (MINIMUM 1 REQUIRED)
        if (e.target.classList.contains('remove-feature')) {
            e.preventDefault();

            const rows = container.querySelectorAll('.feature-row');

            if (rows.length === 1) {
                alert('At least one feature is required.');
                return;
            }

            e.target.closest('.feature-row').remove();
        }
    });
});
</script>

@endsection

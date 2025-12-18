@extends('admin.layout.master')

@section('title', 'Add Facility')

@section('content')
<div class="max-w-4xl bg-white p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Facility</h1>

    <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- HEADING --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Heading</label>
            <input type="text" name="heading" class="w-full border rounded px-3 py-2" placeholder="Facility Heading" required>
        </div>

        {{-- SHORT DESCRIPTION --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Short Description</label>
            <textarea name="short_description" rows="3" class="w-full border rounded px-3 py-2" placeholder="Enter short description" required></textarea>
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="6" class="w-full border rounded px-3 py-2" placeholder="Enter detailed description" required></textarea>
        </div>

        {{-- IMAGE --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Image</label>
             <input type="file" name="image" id="imageInput" class="w-full border rounded px-3 py-2" required>
             <img id="previewImage" class="mt-3 w-40 h-40 object-cover hidden rounded border" alt="Preview">
        </div>

        {{-- SUBMIT BUTTON --}}
        <div class="text-center mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Save Facility</button>
        </div>
    </form>
</div>


<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('previewImage');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }
});
</script>
@endsection

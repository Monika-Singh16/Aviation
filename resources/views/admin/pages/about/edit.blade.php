@extends('admin.layout.master')

@section('title', 'Edit About Section')

@section('content')
<div class="p-8 bg-white">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-3">Edit About Section</h1>

    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div>
                <label class="block text-gray-700 font-bold mb-1">Title</label>
                <input type="text" 
                       name="title" 
                       value="{{ old('title', $about->title) }}" 
                       class="w-full border rounded-lg p-2" 
                       required>
            </div>
            <!-- Subtitle -->
            <div>
                <label class="block text-gray-700 font-bold mb-1">Subtitle</label>
                <input type="text" 
                       name="sub_title" 
                       value="{{ old('sub_title', $about->sub_title) }}" 
                       class="w-full border rounded-lg p-2">
            </div>
        </div>
        
        <!-- Description 1 -->
        <div>
            <label class="block text-gray-700 font-bold mb-1">Description 1</label>
            <textarea name="description_1" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description_1', $about->description_1) }}</textarea>
        </div>

        <!-- Description 2 -->
        <div>
            <label class="block text-gray-700 font-bold mb-1">Description 2</label>
            <textarea name="description_2" rows="4" class="w-full border rounded-lg p-2">{{ old('description_2', $about->description_2) }}</textarea>
        </div>

        <!-- Images -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Main Image -->
            <div>
                <label class="block text-gray-700 font-bold mb-1">Main Image</label>
                <input type="file" name="image" class="w-full border rounded-lg p-2" accept="image/*">
                @if($about->image)
                    <img src="{{ asset($about->image) }}" 
                         alt="Main Image" 
                         class="mt-3 w-24 h-24 rounded-lg object-cover border border-gray-200 shadow">
                @endif
            </div>

            <!-- Image One -->
            <div>
                <label class="block text-gray-700 font-bold mb-1">Image One</label>
                <input type="file" name="image_one" class="w-full border rounded-lg p-2" accept="image/*">
                @if($about->image_one)
                    <img src="{{ asset($about->image_one) }}" 
                         alt="Image One" 
                         class="mt-3 w-24 h-24 rounded-lg object-cover border border-gray-200 shadow">
                @endif
            </div>

            <!-- Image Two -->
            {{-- <div>
                <label class="block text-gray-700 font-bold mb-1">Image Two</label>
                <input type="file" name="image_two" class="w-1/2 border rounded-lg p-2" accept="image/*">
                @if($about->image_two)
                    <img src="{{ asset($about->image_two) }}" 
                         alt="Image Two" 
                         class="mt-3 w-24 h-24 rounded-lg object-cover border border-gray-200 shadow">
                @endif
            </div>

            <!-- Image Three -->
            <div>
                <label class="block text-gray-700 font-bold mb-1">Image Three</label>
                <input type="file" name="image_three" class="w-1/2 border rounded-lg p-2" accept="image/*">
                @if($about->image_three)
                    <img src="{{ asset($about->image_three) }}" 
                         alt="Image Three" 
                         class="mt-3 w-24 h-24 rounded-lg object-cover border border-gray-200 shadow">
                @endif
            </div> --}}
        </div>

        <!-- Dynamic Features -->
        <div>
            <label class="block text-gray-700 font-bold mb-2">Features (Bullet Points)</label>
            <div id="featureContainer" class="space-y-2">
                @php
                    $features = is_array($about->features)
                        ? $about->features
                        : (json_decode($about->features, true) ?? []);
                @endphp
                @foreach($features as $feature)
                <div class="flex gap-2">
                    <input type="text" name="features[]" value="{{ trim($feature) }}" class="w-1/2 border rounded-lg p-2">
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg remove-feature">−</button>
                </div>
                @endforeach
                <div class="flex gap-2">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg add-feature">+</button>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                 Update
            </button>
        </div>
    </form>
</div>

{{-- Dynamic Feature JS --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('featureContainer');

    container.addEventListener('click', e => {
        if (e.target.classList.contains('add-feature')) {
            e.preventDefault();
            const newFeature = document.createElement('div');
            newFeature.className = 'flex gap-2';
            newFeature.innerHTML = `
                <input type="text" name="features[]" class="w-1/2 border rounded-lg p-2" placeholder="Enter a feature">
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg remove-feature">−</button>
            `;
            container.insertBefore(newFeature, container.lastElementChild);
        }

        if (e.target.classList.contains('remove-feature')) {
            e.preventDefault();
            e.target.closest('div').remove();
        }
    });
});
</script>
@endsection

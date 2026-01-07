@extends('admin.layout.master')
@section('title', 'Edit Facility')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Facility</h1>

    <form action="{{ route('facilities.update', $facility->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Note -->
            <div>
                <label class="block text-gray-700 font-semibold">Note</label>
                <input type="text"
                    name="note"
                    value="{{ old('note', $facility->note) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            <!-- Heading -->
            <div>
                <label class="block text-gray-700 font-semibold">Heading</label>
                <input type="text"
                    name="heading"
                    id="heading"
                    value="{{ old('heading', $facility->heading) }}"
                    class="w-full border rounded-lg p-2">
            </div>

            <!-- Short Description -->
            <div>
                <label class="block text-gray-700 font-semibold">Short Description</label>
                <textarea name="short_description"
                    rows="3"
                    class="w-full border rounded-lg p-2">{{ old('short_description', $facility->short_description) }}</textarea>

                <label class="block text-gray-700 font-semibold mt-3">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $facility->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$facility->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Facility URL (slug) --}}
            <div>
                <label class="block font-semibold mb-1">Facility URL (Slug)</label>
                <input
                    type="text"
                    name="facility_url"
                    id="facility_url"
                    value="{{ old('facility_url', $facility->facility_url) }}"
                    class="w-full border px-3 py-2 rounded"
                    required
                >
            </div>

            <!-- Image -->
            <div>
                <label class="block text-gray-700 font-semibold">Image</label>
                <input type="file"
                        name="image"
                        class="w-full border rounded-lg p-2"
                        accept="image/*">

                @if($facility->image)
                    <img src="{{ asset('admin-assets/facility-page/'.$facility->image) }}"
                        class="w-32 mt-2 rounded border">
                @endif

                <label class="block text-gray-700 font-semibold mt-2">Description</label>
                <textarea name="description"
                    rows="4"
                    class="w-full border rounded-lg p-2">{{ old('description', $facility->description) }}</textarea>
            </div>

        </div>

        <!-- FACILITIES JSON -->
        <div class="space-y-4 bg-gray-50 p-4 rounded border">
            <label class="block font-semibold text-gray-700">Facilities</label>

            <div id="facilitiesContainer" class="space-y-3">

                @forelse($facility->features ?? [] as $i => $item)
                    <div class="grid grid-cols-12 gap-3 items-center facility-row">

                        <div class="col-span-1 flex justify-center">
                            @if($i === 0)
                            <button type="button"
                                onclick="addFacilityField()"
                                class="bg-green-500 text-white px-3 py-2 rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                            @endif
                        </div>

                        <div class="col-span-3">
                            <input type="text"
                                name="features[{{ $i }}][icon]"
                                value="{{ $item['icon'] ?? '' }}"
                                class="border px-3 py-2 rounded w-full">
                        </div>

                        <div class="col-span-4">
                            <input type="text"
                                name="features[{{ $i }}][title]"
                                value="{{ $item['title'] ?? '' }}"
                                class="border px-3 py-2 rounded w-full">
                        </div>

                        <div class="col-span-3">
                            <input type="text"
                                name="features[{{ $i }}][description]"
                                value="{{ $item['description'] ?? '' }}"
                                class="border px-3 py-2 rounded w-full">
                        </div>

                        <div class="col-span-1 flex justify-center">
                            <button type="button"
                                onclick="removeFacilityField(this)"
                                class="bg-red-500 text-white px-3 py-2 rounded">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                    @empty
                    {{-- Jab DB me features NULL ho --}}
                    <div class="grid grid-cols-12 gap-3 items-center facility-row">
                        <div class="col-span-1 flex justify-center">
                            <button type="button"
                                onclick="addFacilityField()"
                                class="bg-green-500 text-white px-3 py-2 rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="col-span-3">
                            <input type="text" name="features[0][icon]" class="border px-3 py-2 rounded w-full">
                        </div>

                        <div class="col-span-4">
                            <input type="text" name="features[0][title]" class="border px-3 py-2 rounded w-full">
                        </div>

                        <div class="col-span-3">
                            <input type="text" name="features[0][description]" class="border px-3 py-2 rounded w-full">
                        </div>
                    </div>
                @endforelse
            </div>
        </div>


        <!-- SUBMIT -->
        <div>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Update
            </button>
        </div>

    </form>
</div>

<script>
    let facilityIndex = {{ count($facility->features ?? []) }};

    function addFacilityField() {
        document.getElementById('facilitiesContainer')
        .insertAdjacentHTML('beforeend', `
            <div class="grid grid-cols-12 gap-3 items-center facility-row">

                <div class="col-span-1"></div>

                <div class="col-span-3">
                    <input type="text" name="features[${facilityIndex}][icon]"
                        class="border px-3 py-2 rounded w-full">
                </div>

                <div class="col-span-4">
                    <input type="text" name="features[${facilityIndex}][title]"
                        class="border px-3 py-2 rounded w-full">
                </div>

                <div class="col-span-3">
                    <input type="text" name="features[${facilityIndex}][description]"
                        class="border px-3 py-2 rounded w-full">
                </div>

                <div class="col-span-1 flex justify-center">
                    <button type="button"
                        onclick="removeFacilityField(this)"
                        class="bg-red-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
        `);
        facilityIndex++;
    }

    function removeFacilityField(btn) {
        const rows = document.querySelectorAll('.facility-row');
        if (rows.length === 1) {
            alert('At least one facility is required');
            return;
        }
        btn.closest('.facility-row').remove();
    }
</script>
<script>
    // Image Preview
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
    }

    // Auto-generate slug from facility name (unless user edits slug manually)
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('heading');
        const slugInput = document.getElementById('facility_url');
        let slugEditedManually = false;

        slugInput.addEventListener('input', function () {
            slugEditedManually = true;
        });

        nameInput.addEventListener('input', function () {
            if (slugEditedManually) return;

            const slug = this.value
                .toLowerCase()
                .trim()
                .replace(/[\s_]+/g, '-')     // spaces to hyphen
                .replace(/[^a-z0-9-]/g, '')   // remove invalid chars
                .replace(/-+/g, '-')          // multiple hyphens → single
                .replace(/^-+|-+$/g, '');     // trim hyphens

            slugInput.value = slug;
        });
    });
</script>


@endsection

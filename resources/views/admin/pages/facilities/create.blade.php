@extends('admin.layout.master')
@section('title', 'Add Facility')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Facility</h1>

    <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Note -->
            <div>
                <label class="block text-gray-700 font-semibold">Note</label>
                <input type="text" name="note" class="w-full border rounded-lg p-2">
            </div>

            <!-- Heading -->
            <div>
                <label class="block text-gray-700 font-semibold">Heading</label>
                <input type="text" name="heading" id="heading" class="w-full border rounded-lg p-2">
            </div>

            <div>
                {{-- Slug Url --}}
                <label class="block font-semibold mb-1">Facility URL (Slug)</label>
                <input
                    type="text"
                    name="facility_url"
                    id="facility_url"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="auto-generated-from-facility-name"
                    value="{{ old('facility_url') }}"
                    required
                >
                @error('facility_url')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Short Description -->
                <label class="block text-gray-700 font-semibold mt-3">Short Description</label>
                <textarea name="short_description" rows="3"
                    class="w-full border rounded-lg p-2"></textarea>

                {{-- Status --}}
                <label class="block text-gray-700 font-semibold mb-1 mt-3">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-gray-700 font-semibold">Image</label>
                <input type="file" name="image"
                    class="w-full border rounded-lg p-2" accept="image/*">

                {{-- Description --}}
                <label class="block text-gray-700 font-semibold mt-2">Description</label>
                <textarea name="description" rows="4"
                    class="w-full border rounded-lg p-2"></textarea>
            </div>

        </div>

        <!-- FEATURES (JSON ARRAY like Advantage ratings) -->
        <div class="space-y-4 bg-gray-50 p-4 rounded border">
            <label class="block font-semibold text-gray-700">Facilities</label>

            <div id="facilitiesContainer" class="space-y-3">

                <div class="grid grid-cols-12 gap-3 items-center facility-row">

                    <!-- Add Button -->
                    <div class="col-span-1 flex justify-center">
                        <button type="button"
                            onclick="addFacilityField()"
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <!-- Icon -->
                    <div class="col-span-3">
                        <input type="text"
                            name="features[0][icon]"
                            placeholder="icon"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <!-- Title -->
                    <div class="col-span-4">
                        <input type="text"
                            name="features[0][title]"
                            placeholder="title"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <!-- Description -->
                    <div class="col-span-3">
                        <input type="text"
                            name="features[0][description]"
                            placeholder="description"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <!-- Remove Button -->
                    <div class="col-span-1 flex justify-center">
                        <button type="button"
                            onclick="removeFacilityField(this)"
                            class="remove-btn bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <!-- SUBMIT -->
        <div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Submit
            </button>
        </div>

    </form>
</div>

<script>
    let facilityIndex = 1;

    function addFacilityField() {
        document.getElementById('facilitiesContainer')
        .insertAdjacentHTML('beforeend', `
            <div class="grid grid-cols-12 gap-3 items-center facility-row">

                <!-- Add Button -->
                <div class="col-span-1 flex justify-center">
                    <button type="button"
                        onclick="addFacilityField()"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="col-span-3">
                    <input type="text" name="features[${facilityIndex}][icon]"
                        class="w-full border px-3 py-2 rounded">
                </div>

                <div class="col-span-4">
                    <input type="text" name="features[${facilityIndex}][title]"
                        class="w-full border px-3 py-2 rounded">
                </div>

                <div class="col-span-3">
                    <input type="text" name="features[${facilityIndex}][description]"
                        class="w-full border px-3 py-2 rounded">
                </div>

                <div class="col-span-1 flex justify-center">
                    <button type="button"
                        onclick="removeFacilityField(this)"
                        class="bg-red-500 text-white px-3 py-2 rounded">
                        -
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
        document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.getElementById('heading');
            const slugInput = document.getElementById('facility_url');

            let slugManuallyChanged = false;

            slugInput.addEventListener('input', function () {
                slugManuallyChanged = true;
            });

            nameInput.addEventListener('input', function () {
                if (slugManuallyChanged) {
                    return;
                }

                const value = this.value || '';

                const slug = value
                    .toLowerCase()
                    .trim()
                    .replace(/[\s_]+/g, '-')        
                    .replace(/[^a-z0-9-]/g, '')    
                    .replace(/-+/g, '-')            
                    .replace(/^-+|-+$/g, '');        

                slugInput.value = slug;
            });
        });
    </script>
@endsection

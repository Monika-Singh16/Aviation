@extends('admin.layout.master')

@section('title', 'Add Aircraft')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Aircraft</h1>

    <form action="{{ route('aircraft.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- BASIC DETAILS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="font-semibold">Facility</label>
                <select name="facility_id" class="w-full border rounded p-2" required>
                    <option value="">-- Select Facility --</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}">{{ $facility->heading }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="font-semibold">Status</label>
                <select name="is_active" class="w-full border rounded p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div>
                <label class="font-semibold">Description</label>
                <textarea name="desc" rows="2" class="w-full border rounded p-2"></textarea>
            </div>
        </div>

        {{-- FEATURES --}}
        <div>
            <label class="text-xl font-bold mb-4">Features</label>
            
            <div id="featuresContainer" class="space-y-4">

                <!-- Initial Feature Row -->
                <div class="grid grid-cols-12 gap-2 items-center feature-row">

                    <!-- ADD BUTTON LEFT -->
                    <div class="col-span-1 flex justify-center">
                        <button type="button" onclick="addFeature()"
                            class="bg-green-500 text-white w-10 h-10 flex items-center justify-center rounded">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <!-- FEATURE FIELDS (4 DIVS, half-half) -->
                    <div class="col-span-10 grid grid-cols-2 gap-4 bg-gray-50 border rounded-lg p-3">

                        <!-- IMAGE -->
                        <div>
                            <input type="file" name="features[0][image]" class="w-full border rounded p-2">
                        </div>

                        <!-- ICON -->
                        <div>
                            <input type="text" name="features[0][icon]" placeholder="Icon" class="w-full border rounded p-2">
                        </div>

                        <!-- TITLE -->
                        <div>
                            <input type="text" name="features[0][title]" placeholder="Title" class="w-full border rounded p-2">
                        </div>

                        <!-- DESCRIPTION -->
                        <div>
                            <input type="text" name="features[0][description]" placeholder="Description" class="w-full border rounded p-2">
                        </div>

                    </div>

                    <!-- REMOVE BUTTON RIGHT -->
                    <div class="col-span-1 flex justify-center">
                        <button type="button" onclick="removeFeature(this)"
                            class="bg-red-500 text-white w-10 h-10 flex items-center justify-center rounded">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>

        {{-- SUBMIT --}}
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Save
        </button>

    </form>
</div>

{{-- JS --}}
<script>
    let featureIndex = 1; // Next feature index

    function addFeature() {
        const container = document.getElementById('featuresContainer');

        const html = `
            <div class="grid grid-cols-12 gap-2 items-center feature-row">

                <!-- ADD BUTTON LEFT -->
                <div class="col-span-1 flex justify-center">
                    <button type="button" onclick="addFeature()"
                        class="bg-green-500 text-white w-10 h-10 flex items-center justify-center rounded">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <!-- FEATURE FIELDS -->
                <div class="col-span-10 grid grid-cols-2 gap-4 bg-gray-50 border rounded-lg p-3">

                    <div>
                        <input type="file" name="features[${featureIndex}][image]" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <input type="text" name="features[${featureIndex}][icon]" placeholder="Icon" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <input type="text" name="features[${featureIndex}][title]" placeholder="Title" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <input type="text" name="features[${featureIndex}][description]" placeholder="Description" class="w-full border rounded p-2">
                    </div>

                </div>

                <!-- REMOVE BUTTON RIGHT -->
                <div class="col-span-1 flex justify-center">
                    <button type="button" onclick="removeFeature(this)"
                        class="bg-red-500 text-white w-10 h-10 flex items-center justify-center rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
        featureIndex++;
    }

    function removeFeature(button) {
        const rows = document.querySelectorAll('.feature-row');
        if (rows.length === 1) {
            alert('At least one feature is required.');
            return;
        }
        button.closest('.feature-row').remove();
    }
</script>

@endsection

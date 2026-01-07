@extends('admin.layout.master')

@section('title', 'Edit Aircraft')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Aircraft</h1>

    @php
        $features = json_decode($aircraft->features, true) ?? [];
    @endphp

    <form action="{{ route('aircraft.update', $aircraft->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('PUT')

        {{-- BASIC DETAILS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="font-semibold">Facility</label>
                <select name="facility_id" class="w-full border rounded p-2" required>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}"
                            {{ $facility->id == $aircraft->facility_id ? 'selected' : '' }}>
                            {{ $facility->heading }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="font-semibold">Title</label>
                <input type="text"
                    name="title"
                    value="{{ $aircraft->title }}"
                    class="w-full border rounded p-2"
                    required>
            </div>

            <div>
                <label class="font-semibold">Status</label>
                <select name="is_active" class="w-full border rounded p-2">
                    <option value="1" {{ $aircraft->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$aircraft->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div>
                <label class="font-semibold">Description</label>
                <textarea name="desc" rows="2" class="w-full border rounded p-2">{{ $aircraft->desc }}</textarea>
            </div>
        </div>

        {{-- FEATURES --}}
        <div>
            <label class="text-xl font-bold mb-4">Features</label>

            <div id="featuresContainer" class="space-y-4">

                @foreach($features as $index => $feature)
                <div class="grid grid-cols-12 gap-2 items-center feature-row">

                    {{-- ADD --}}
                    <div class="col-span-1 flex justify-center">
                        <button type="button" onclick="addFeature()"
                                class="bg-green-500 text-white w-10 h-10 flex items-center justify-center rounded">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    {{-- FIELDS --}}
                    <div class="col-span-10 grid grid-cols-2 gap-4 bg-gray-50 border rounded-lg p-3">

                        <div>
                            <input type="file" name="features[{{ $index }}][image]"
                                class="w-full border rounded p-2">

                            @if(!empty($feature['image']))
                                <img src="{{ asset($feature['image']) }}"
                                    class="mt-2 w-20 h-16 object-cover border rounded">
                            @endif
                        </div>

                        <div>
                            <input type="text"
                                name="features[{{ $index }}][icon]"
                                value="{{ $feature['icon'] }}"
                                placeholder="Icon"
                                class="w-full border rounded p-2">
                        </div>

                        <div>
                            <input type="text"
                                name="features[{{ $index }}][title]"
                                value="{{ $feature['title'] }}"
                                placeholder="Title"
                                class="w-full border rounded p-2">
                        </div>

                        <div>
                            <input type="text"
                                name="features[{{ $index }}][description]"
                                value="{{ $feature['description'] }}"
                                placeholder="Description"
                                class="w-full border rounded p-2">
                        </div>

                    </div>

                    {{-- REMOVE --}}
                    <div class="col-span-1 flex justify-center">
                        <button type="button" onclick="removeFeature(this)"
                                class="bg-red-500 text-white w-10 h-10 flex items-center justify-center rounded">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                @endforeach

            </div>
        </div>

        {{-- BUTTONS --}}
        <a href="{{ route('aircraft.index') }}"
            class="bg-gray-600 text-white px-6 py-2 rounded">
            Back
        </a>

        <button class="bg-green-600 text-white px-6 py-2 rounded ml-2">
            Update
        </button>

    </form>
</div>

{{-- JS --}}
<script>
    let featureIndex = {{ count($features) }};

    function addFeature() {
        const container = document.getElementById('featuresContainer');

        const html = `
        <div class="grid grid-cols-12 gap-2 items-center feature-row">

            <div class="col-span-1 flex justify-center">
                <button type="button" onclick="addFeature()"
                        class="bg-green-500 text-white w-10 h-10 rounded"> <i class="fas fa-plus"></i> </button>
            </div>

            <div class="col-span-10 grid grid-cols-2 gap-4 bg-gray-50 border rounded-lg p-3">

                <input type="file" name="features[${featureIndex}][image]" class="border p-2 rounded">
                <input type="text" name="features[${featureIndex}][icon]" placeholder="Icon" class="border p-2 rounded">
                <input type="text" name="features[${featureIndex}][title]" placeholder="Title" class="border p-2 rounded">
                <input type="text" name="features[${featureIndex}][description]" placeholder="Description" class="border p-2 rounded">

            </div>

            <div class="col-span-1 flex justify-center">
                <button type="button" onclick="removeFeature(this)"
                        class="bg-red-500 text-white w-10 h-10 rounded"> <i class="fas fa-minus"></i> </button>
            </div>
        </div>`;

        container.insertAdjacentHTML('beforeend', html);
        featureIndex++;
    }

    function removeFeature(btn) {
        if (document.querySelectorAll('.feature-row').length > 1) {
            btn.closest('.feature-row').remove();
        } else {
            alert('At least one feature is required');
        }
    }
</script>
@endsection

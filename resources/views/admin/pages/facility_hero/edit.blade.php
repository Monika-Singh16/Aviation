@extends('admin.layout.master')
@section('title', 'Edit Facility Hero')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Facility Hero</h1>

    <form action="{{ route('facility_hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Facility -->
            <div>
                <label class="block font-semibold mb-1">Select Facility <span class="text-red-500">*</span></label>
                <select name="facility_id" class="w-full border px-3 py-2 rounded" required>
                    <option value="">-- Select Facility --</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}" {{ $hero->facility_id == $facility->id ? 'selected' : '' }}>
                            {{ $facility->heading }}
                        </option>
                    @endforeach
                </select>
                @error('facility_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Heading -->
            <div>
                <label class="block font-semibold mb-1">Heading</label>
                <input type="text" name="heading"
                    class="w-full border px-3 py-2 rounded"
                    value="{{ old('heading', $hero->heading) }}">
            </div>

            <!-- Image -->
            <div>
                <label class="block font-semibold mb-1">Image</label>
                <input type="file" name="image"
                    class="w-full border px-3 py-2 rounded" accept="image/*">

                @if($hero->image)
                    <img src="{{ asset('admin-assets/facility-hero/' . $hero->image) }}" alt="Hero Image" class="mt-2 w-32 h-20 object-cover rounded">
                @endif
            </div>

            <!-- Description -->
            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="desc" rows="3"
                    class="w-full border px-3 py-2 rounded">{{ old('desc', $hero->desc) }}</textarea>

                <!-- Status -->
                <label class="block font-semibold mb-1 mt-3">Status</label>
                <select name="is_active" class="w-full border px-3 py-2 rounded">
                    <option value="1" {{ $hero->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$hero->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>

        <!-- STATS -->
        <div class="bg-gray-50 p-4 rounded border space-y-4">
            <label class="block font-semibold text-gray-700">Stats</label>

            <div id="statsContainer" class="space-y-3">
                @php
                    $stats = old('stat', $hero->stat ?? []);
                @endphp

                @if(count($stats) == 0)
                    @php $stats = [['value' => '', 'label' => '']]; @endphp
                @endif

                @foreach($stats as $index => $stat)
                    <div class="grid grid-cols-12 gap-3 items-center stat-row">
                        <div class="col-span-1 flex justify-center">
                            <button type="button" onclick="addStatField()"
                                class="bg-green-500 text-white px-3 py-2 rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="col-span-5">
                            <input type="text" name="stat[{{ $index }}][value]"
                                placeholder="Value"
                                class="w-full border px-3 py-2 rounded"
                                value="{{ $stat['value'] }}">
                        </div>

                        <div class="col-span-5">
                            <input type="text" name="stat[{{ $index }}][label]"
                                placeholder="Label"
                                class="w-full border px-3 py-2 rounded"
                                value="{{ $stat['label'] }}">
                        </div>

                        <div class="col-span-1 flex justify-center">
                            <button type="button"
                                onclick="removeStatField(this)"
                                class="bg-red-500 text-white px-3 py-2 rounded">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                @endforeach

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

{{-- JS --}}
<script>
    let statIndex = {{ count($stats) }};

    function addStatField() {
        document.getElementById('statsContainer').insertAdjacentHTML('beforeend', `
            <div class="grid grid-cols-12 gap-3 items-center stat-row">

                <div class="col-span-1 flex justify-center">
                    <button type="button" onclick="addStatField()"
                        class="bg-green-500 text-white px-3 py-2 rounded"><i class="fas fa-plus"></i></button>
                </div>

                <div class="col-span-5">
                    <input type="text" name="stat[${statIndex}][value]"
                        placeholder="Value"
                        class="w-full border px-3 py-2 rounded">
                </div>

                <div class="col-span-5">
                    <input type="text" name="stat[${statIndex}][label]"
                        placeholder="Label"
                        class="w-full border px-3 py-2 rounded">
                </div>

                <div class="col-span-1 flex justify-center">
                    <button type="button"
                        onclick="removeStatField(this)"
                        class="bg-red-500 text-white px-3 py-2 rounded"><i class="fas fa-minus"></i></button>
                </div>

            </div>
        `);
        statIndex++;
    }

    function removeStatField(btn) {
        const rows = document.querySelectorAll('.stat-row');
        if (rows.length === 1) {
            alert('At least one stat is required');
            return;
        }
        btn.closest('.stat-row').remove();
    }
</script>
@endsection

@extends('admin.layout.master')
@section('title', 'Add Facility Hero')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Facility Hero</h1>

    <form action="{{ route('facility_hero.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Facility -->
            <div>
                <label class="block font-semibold mb-1">Select Facility <span class="text-red-500">*</span></label>
                <select name="facility_id" class="w-full border px-3 py-2 rounded" required>
                    <option value="">-- Select Facility --</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}">
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
                    value="{{ old('heading') }}">
            </div>

            <!-- Image -->
            <div>
                <label class="block font-semibold mb-1">Image</label>
                <input type="file" name="image"
                    class="w-full border px-3 py-2 rounded" accept="image/*">

                <!-- Status -->
                <label class="block font-semibold mb-1 mt-3">Status</label>
                <select name="is_active" class="w-full border px-3 py-2 rounded">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Description -->
            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="desc" rows="3"
                    class="w-full border px-3 py-2 rounded">{{ old('desc') }}</textarea>
            </div>

        </div>

        <!-- STATS -->
        <div class="bg-gray-50 p-4 rounded border space-y-4">
            <label class="block font-semibold text-gray-700">Stats</label>

            <div id="statsContainer" class="space-y-3">

                <div class="grid grid-cols-12 gap-3 items-center stat-row">

                    <div class="col-span-1 flex justify-center">
                        <button type="button" onclick="addStatField()"
                            class="bg-green-500 text-white px-3 py-2 rounded">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <div class="col-span-5">
                        <input type="text" name="stat[0][value]"
                            placeholder="Value"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div class="col-span-5">
                        <input type="text" name="stat[0][label]"
                            placeholder="Label"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div class="col-span-1 flex justify-center">
                        <button type="button"
                            onclick="removeStatField(this)"
                            class="bg-red-500 text-white px-3 py-2 rounded">
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

{{-- JS --}}
<script>
    let statIndex = 1;

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

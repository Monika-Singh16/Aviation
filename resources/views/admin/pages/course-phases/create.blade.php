@extends('admin.layout.master')
@section('title', 'Add Course Phase')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add Course Phase</h1>

<form action="{{ route('course_phases.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Course Selection -->
        <div>
            <label class="block font-semibold mb-1"> Select Course</label>
            <select name="course_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Module Title -->
        <div>
            <label class="block font-semibold mb-1">Module Title</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Heading -->
        <div>
            <label class="block font-semibold mb-1">Section Heading</label>
            <input type="text" name="heading" class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Icon -->
        <div>
            <label class="block font-semibold mb-1">Icon</label>
            <input type="text" name="icon" placeholder="fa-book-open"
                    class="w-full border px-3 py-2 rounded" >
        </div>

        <!-- Description -->
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="3"
                class="w-full border px-3 py-2 rounded" ></textarea>
        </div>

        <!-- Extra Description -->
        <div>
            <label class="block font-semibold mb-1">Phase Description</label>
            <textarea name="desc" rows="3"
                class="w-full border px-3 py-2 rounded"></textarea>
        </div>

            <!-- STATS -->
            <div class="space-y-4 bg-gray-50 p-4 rounded border">
                <label class="block font-semibold text-gray-700">Stats</label>

                <div id="statsContainer" class="space-y-3">

                    <div class="grid grid-cols-12 gap-3 items-center">
                        <!-- Add Button -->
                        <div class="col-span-1 flex justify-center">
                            <button type="button"
                                onclick="addStatField()"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <!-- Icon -->
                        <div class="col-span-3">
                            <input type="text"
                                name="stats[0][icon]"
                                placeholder="fa-clock"
                                class="w-full border px-3 py-2 rounded">
                        </div>

                        <!-- Number -->
                        <div class="col-span-3">
                            <input type="text"
                                name="stats[0][number]"
                                placeholder="200+"
                                class="w-full border px-3 py-2 rounded">
                        </div>

                        <!-- Label -->
                        <div class="col-span-4">
                            <input type="text"
                                name="stats[0][label]"
                                placeholder="Training Hours"
                                class="w-full border px-3 py-2 rounded">
                        </div>

                        <!-- Remove Button -->
                        <div class="col-span-1 flex justify-center">
                            <button type="button"
                                onclick="removeStatField(this)"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                </div>
            </div>

            <!-- FEATURES -->
            <div class="space-y-4 bg-gray-50 p-4 rounded border">
                <label class=" font-semibold text-gray-700">Features</label>

                <div id="featuresContainer" class="space-y-3">
                    <div class="flex items-center gap-3">
                        <!-- Add -->
                        <button type="button"
                            onclick="addFeatureField()"
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-plus"></i>
                        </button>

                        <!-- Feature text -->
                        <input type="text"
                            name="features[0][text]"
                            placeholder="Feature text"
                            class="border px-3 py-2 rounded flex-1">

                        <!-- Remove -->
                        <button type="button"
                            onclick="removeFeatureField(this)"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        

        {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Submit
    </button>
</form>

<script>
    // Index counters
    let featureIndex = 1;
    let statIndex = 1;

    /* =========================
        FEATURES
    ========================== */

    function addFeatureField() {
        const container = document.getElementById('featuresContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-3 mb-2';

        newField.innerHTML = `
            <button type="button" onclick="addFeatureField()"
                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>

            <input type="text"
                name="features[${featureIndex}][text]"
                placeholder="Feature text"
                class="border px-3 py-2 rounded flex-1">

            <button type="button" onclick="removeFeatureField(this)"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;

        container.appendChild(newField);
        featureIndex++;
    }

    function removeFeatureField(button) {
        const container = document.getElementById('featuresContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }

    /* =========================
        STATS
    ========================== */
    function addStatField() {
        const container = document.getElementById('statsContainer');

        const div = document.createElement('div');
        div.className = 'grid grid-cols-1 md:grid-cols-12 gap-3 items-center';

        div.innerHTML = `
            <!-- Plus Button -->
            <div class="md:col-span-1 flex justify-center">
                <button type="button"
                    onclick="addStatField()"
                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <!-- Icon -->
            <div class="md:col-span-3">
                <input type="text"
                    name="stats[${statIndex}][icon]"
                    placeholder="fa-clock"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <!-- Number -->
            <div class="md:col-span-3">
                <input type="text"
                    name="stats[${statIndex}][number]"
                    placeholder="200+"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <!-- Label -->
            <div class="md:col-span-4">
                <input type="text"
                    name="stats[${statIndex}][label]"
                    placeholder="Training Hours"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <!-- Minus Button -->
            <div class="md:col-span-1 flex justify-center">
                <button type="button"
                    onclick="removeStatField(this)"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        `;

        container.appendChild(div);
        statIndex++;
        normalizeStatButtons();
    }

    function removeStatField(btn) {
        const container = document.getElementById('statsContainer');

        if (container.children.length > 1) {
            btn.closest('.grid').remove();
            normalizeStatButtons();
        }
    }
</script>

@endsection

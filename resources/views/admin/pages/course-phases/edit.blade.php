@extends('admin.layout.master')
@section('title', 'Edit Course Phase')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Course Phase</h1>

<form action="{{ route('course_phases.update', $coursePhase->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Course -->
        <div>
            <label class="block font-semibold mb-1">Select Course</label>
            <select name="course_id" class="w-full border px-3 py-2 rounded">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $coursePhase->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Icon -->
        <div>
            <label class="block font-semibold mb-1">Module Icon</label>
            <input type="text" name="icon" value="{{ $coursePhase->icon }}" class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Heading -->
        <div>
            <label class="block font-semibold mb-1">Section Heading</label>
            <input type="text" name="heading" value="{{ $coursePhase->heading }}" class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Title -->
        <div>
            <label class="block font-semibold mb-1">Module Title</label>
            <input type="text" name="title" value="{{ $coursePhase->title }}" class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Description -->
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded">{{ $coursePhase->description }}</textarea>
        </div>

        <!-- Phase Description -->
        <div>
            <label class="block font-semibold mb-1">Phase Description</label>
            <textarea name="desc" rows="3" class="w-full border px-3 py-2 rounded">{{ $coursePhase->desc }}</textarea>
        </div>

        <!-- STATS -->
        <div class="space-y-4 bg-gray-50 p-4 rounded border">
            <label class="block font-semibold text-gray-700">Stats</label>
            <div id="statsContainer" class="space-y-3">
                @foreach($coursePhase->stats ?? [] as $i => $stat)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                        <div class="col-span-1 flex justify-center">
                            <button type="button" onclick="addStatField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="col-span-3">
                            <input type="text" name="stats[{{ $i }}][icon]" value="{{ $stat['icon'] ?? '' }}" placeholder="fa-clock" class="border px-3 py-2 rounded w-full">
                        </div>
                        <div class="col-span-3">
                            <input type="text" name="stats[{{ $i }}][number]" value="{{ $stat['number'] ?? '' }}" placeholder="200+" class="border px-3 py-2 rounded w-full">
                        </div>
                        <div class="col-span-4">
                            <input type="text" name="stats[{{ $i }}][label]" value="{{ $stat['label'] ?? '' }}" placeholder="Training Hours" class="border px-3 py-2 rounded w-full">
                        </div>
                        <div class="col-span-1 flex justify-center">
                            <button type="button" onclick="removeStatField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- FEATURES -->
        <div class="space-y-4 bg-gray-50 p-4 rounded border">
            <label class="block font-semibold text-gray-700">Features</label>
            <div id="featuresContainer" class="space-y-2">
                @foreach($coursePhase->features ?? [] as $i => $feature)
                    <div class="flex items-center gap-2 mb-2">
                        <button type="button" onclick="addFeatureField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-plus"></i>
                        </button>

                        <input type="text" name="features[{{ $i }}][text]" value="{{ $feature['text'] ?? '' }}" placeholder="Feature text" class="border px-3 py-2 rounded flex-1">

                        <button type="button" onclick="removeFeatureField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Status -->
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="is_active" class="w-full border px-3 py-2 rounded">
                <option value="1" {{ $coursePhase->is_active == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $coursePhase->is_active == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update</button>
</form>

<script>
    let statIndex = {{ count($coursePhase->stats ?? []) }};
    let featureIndex = {{ count($coursePhase->features ?? []) }};

    // STATS
    function addStatField() {
        const container = document.getElementById('statsContainer');
        const div = document.createElement('div');
        div.className = 'grid grid-cols-1 md:grid-cols-12 gap-3 items-center';

        div.innerHTML = `
            <div class="col-span-1 flex justify-center">
                <button type="button" onclick="addStatField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="col-span-3">
                <input type="text" name="stats[${statIndex}][icon]" placeholder="fa-clock" class="border px-3 py-2 rounded w-full">
            </div>

            <div class="col-span-3">
                <input type="text" name="stats[${statIndex}][number]" placeholder="200+" class="border px-3 py-2 rounded w-full">
            </div>

            <div class="col-span-4">
                <input type="text" name="stats[${statIndex}][label]" placeholder="Training Hours" class="border px-3 py-2 rounded w-full">
            </div>

            <div class="col-span-1 flex justify-center">
                <button type="button" onclick="removeStatField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        `;

        container.appendChild(div);
        statIndex++;
    }

    function removeStatField(btn) {
        const container = document.getElementById('statsContainer');
        if (container.children.length > 1) btn.parentElement.remove();
    }

    // FEATURES
    function addFeatureField() {
        const container = document.getElementById('featuresContainer');
        const div = document.createElement('div');
        div.className = 'flex items-center gap-2 mb-2';

        div.innerHTML = `
            <button type="button" onclick="addFeatureField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>

            <input type="text" name="features[${featureIndex}][text]" placeholder="Feature text" class="border px-3 py-2 rounded flex-1">

            <button type="button" onclick="removeFeatureField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;

        container.appendChild(div);
        featureIndex++;
    }

    function removeFeatureField(btn) {
        const container = document.getElementById('featuresContainer');
        if (container.children.length > 1) btn.parentElement.remove();
    }
</script>
@endsection

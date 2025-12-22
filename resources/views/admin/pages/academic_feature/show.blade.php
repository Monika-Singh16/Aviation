@extends('admin.layout.master')

@section('title', 'View Academic Feature Section')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Academic Feature Details</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Sub Title --}}
        <div>
            <label class="block text-gray-800 font-semibold mb-1">Heading:</label>
            <div class="p-3 rounded-lg">
                {{ $academic_feature->sub_title ?? '-' }}
            </div>
        </div>

        {{-- Title --}}
        <div>
            <label class="block text-gray-800 font-semibold mb-1">Title:</label>
            <div class="p-3 rounded-lg">
                {{ $academic_feature->title ?? '-' }}
            </div>
        </div>

        {{-- ================= Vihanga ================= --}}
        <div>
            <label class="block text-gray-800 font-semibold mb-1">
                Vihanga Aviation Academy:
            </label>
            <div class="p-3 rounded-lg">
                @if($academic_feature->vihanga_type === 'boolean')
                    @if($academic_feature->vihanga_bool)
                        <span class="text-green-600 font-semibold">
                            <i class="fas fa-check-circle"></i> Yes
                        </span>
                    @else
                        <span class="text-red-600 font-semibold">
                            <i class="fas fa-times-circle"></i> No
                        </span>
                    @endif
                @else
                    <span class="font-semibold">
                        {{ $academic_feature->vihanga_text }}
                    </span>
                @endif
            </div>
        </div>

        {{-- ================= Other Academics ================= --}}
        <div>
            <label class="block text-gray-800 font-semibold mb-1">
                Other Academics:
            </label>
            <div class="p-3 rounded-lg">
                @if($academic_feature->other_type === 'boolean')
                    @if($academic_feature->other_bool)
                        <span class="text-green-600 font-semibold">
                            <i class="fas fa-check-circle"></i> Yes
                        </span>
                    @else
                        <span class="text-red-600 font-semibold">
                            <i class="fas fa-times-circle"></i> No
                        </span>
                    @endif
                @else
                    <span class="font-semibold">
                        {{ $academic_feature->other_text }}
                    </span>
                @endif
            </div>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-800 font-semibold mb-1">Status:</label>
            <div class="p-3 rounded-lg">
                @if($academic_feature->is_active)
                    <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700 font-semibold">
                        Active
                    </span>
                @else
                    <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700 font-semibold">
                        Inactive
                    </span>
                @endif
            </div>
        </div>

    </div>

    {{-- Action Buttons --}}
    <div class="mt-8 flex gap-4">
        <a href="{{ route('academic_feature.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
            Back
        </a>

        <a href="{{ route('academic_feature.edit', $academic_feature->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Edit
        </a>
    </div>
</div>
@endsection

@extends('admin.layout.master')
@section('title', 'Add State')

@section('content')
<h1 class="text-2xl font-bold mb-6">Add State</h1>

<form action="{{ route('states.store') }}" method="POST" class="space-y-6">
    @csrf

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- State Name -->
        <div>
            <label class="block font-semibold mb-1">State Name</label>
            <input type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full border px-3 py-2 rounded"
                placeholder="e.g. Maharashtra"
                required>
        </div>

        <!-- Status -->
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="is_active" class="w-full border px-3 py-2 rounded">
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

    </div>

    <!-- Buttons -->
    <div class="flex gap-3">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Save State
        </button>

        <a href="{{ route('states.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
            Cancel
        </a>
    </div>
</form>
@endsection

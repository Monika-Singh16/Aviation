@extends('admin.layout.master')

@section('title', 'Edit City')

@section('content')
<div class="p-6 bg-white">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit City</h1>

    <form action="{{ route('cities.update', $city->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

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

            <!-- State -->
            <div>
                <label class="block text-gray-700 font-semibold">State</label>
                <select name="state_id" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Select State --</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"
                            {{ $city->state_id == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- City Name -->
            <div>
                <label class="block text-gray-700 font-semibold">City Name</label>
                <input type="text"
                    name="name"
                    value="{{ old('name', $city->name) }}"
                    class="w-full border rounded-lg p-2"
                    required>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="is_active" class="w-full border rounded-lg p-2">
                    <option value="1" {{ $city->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$city->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>

        <!-- Submit -->
        <div class="flex gap-4">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Update City
            </button>

            <a href="{{ route('cities.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

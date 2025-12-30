@extends('admin.layout.master')

@section('title', 'Cities')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Cities</h1>
    <a href="{{ route('cities.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add City
    </a>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">City Name</th>
            <th class="border px-4 py-2">State</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($cities as $city)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">
                {{ $loop->iteration }}
            </td>

            <td class="border px-4 py-2">
                {{ $city->name }}
            </td>

            <td class="border px-4 py-2">
                {{ $city->state->name ?? '-' }}
            </td>

            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $city->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $city->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="border px-4 py-2">
                <div class="flex gap-2 justify-center">

                    <!-- View -->
                    <a href="{{ route('cities.show', $city->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('cities.edit', $city->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('cities.destroy', $city->id) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this city?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                            title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-4 text-gray-500">
                No Cities Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

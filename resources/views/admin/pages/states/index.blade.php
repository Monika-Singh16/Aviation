@extends('admin.layout.master')

@section('title', 'States')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">States</h1>
    <a href="{{ route('states.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add State
    </a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">State Name</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($states as $state)
        <tr class="hover:bg-gray-50 align-top">
            <td class="border px-4 py-2 text-center">
                {{ $loop->iteration }}
            </td>

            <td class="border px-4 py-2">
                {{ $state->name }}
            </td>

            <!-- Status -->
            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $state->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $state->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <!-- Actions -->
            <td class="border px-4 py-2">
                <div class="flex gap-2 justify-center">

                    <!-- View -->
                    <a href="{{ route('states.show', $state->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('states.edit', $state->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('states.destroy', $state->id) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this state?')">
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
            <td colspan="4" class="text-center py-4 text-gray-500">
                No States Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

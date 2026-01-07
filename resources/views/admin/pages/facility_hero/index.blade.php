@extends('admin.layout.master')

@section('title', 'Facility Heroes')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Facility Heroes</h1>

    <a href="{{ route('facility_hero.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Facility Hero
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Facility</th>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($heroes as $hero)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="border px-4 py-2">
                    {{ $hero->facility->heading ?? '—' }}
                </td>

                <td class="border px-4 py-2">
                    {{ $hero->heading }}
                </td>

                <td class="border px-4 py-2 text-center">
                    @if($hero->is_active)
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                            Active
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">
                            Inactive
                        </span>
                    @endif
                </td>

                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center gap-2">

                        <!-- View -->
                        <a href="{{ route('facility_hero.show', $hero->id) }}"
                            title="View"
                            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-eye"></i>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('facility_hero.edit', $hero->id) }}"
                            title="Edit"
                            class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('facility_hero.destroy', $hero->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this Facility Hero?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-gray-600">
                    No Facility Heroes Found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

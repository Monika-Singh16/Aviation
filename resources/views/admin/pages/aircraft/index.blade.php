@extends('admin.layout.master')

@section('title', 'Aircraft Management')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Aircrafts</h1>

    <a href="{{ route('aircraft.create') }}" 
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Aircraft
    </a>
</div>

{{-- SUCCESS MESSAGE --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Facility</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($aircrafts as $aircraft)
        <tr class="hover:bg-gray-50">

            {{-- ID --}}
            <td class="border px-4 py-2 text-center">
                {{ $loop->iteration }}
            </td>

            {{-- TITLE --}}
            <td class="border px-4 py-2">
                {{ $aircraft->title }}
            </td>

            {{-- FACILITY --}}
            <td class="border px-4 py-2 text-center">
                {{ $aircraft->facility->heading ?? '—' }}
            </td>

            {{-- STATUS --}}
            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $aircraft->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $aircraft->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            {{-- ACTIONS --}}
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center gap-2">

                    {{-- VIEW --}}
                    <a href="{{ route('aircraft.show', $aircraft->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    {{-- EDIT --}}
                    <a href="{{ route('aircraft.edit', $aircraft->id) }}" 
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    {{-- DELETE --}}
                    <form action="{{ route('aircraft.destroy', $aircraft->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this aircraft?')">
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
            <td colspan="5" class="text-center py-4 text-gray-600">
                No Aircraft Data Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

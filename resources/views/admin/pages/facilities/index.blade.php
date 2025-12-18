@extends('admin.layout.master')
@section('title', 'Facilities')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Facilities</h1>
    <a href="{{ route('facilities.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-lg shadow">
       + Add Facility
    </a>
</div>

<!-- @if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-6 shadow-sm">
    {{ session('success') }}
</div>
@endif -->

<table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2 text-left">Id</th>
            <th class="border px-4 py-2 text-left">Heading</th>
            <th class="border px-4 py-2 text-left">Short Description</th>
            <th class="border px-4 py-2 text-center">Image</th>
            <th class="border px-4 py-2 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($facilities as $key => $item)
        <tr class="hover:bg-gray-50 transition">
            <td class="border px-4 py-2">{{ $key + 1 }}</td>
            <td class="border px-4 py-2 font-semibold">{{ $item->heading }}</td>
            <td class="border px-4 py-2">{{ Str::limit($item->short_description, 50) }}</td>
            <td class="border px-4 py-2 text-center">
                <img src="{{ asset('admin-assets/facility-page/' . $item->image) }}"
                    alt="{{ $item->heading }}"
                    class="w-16 h-16 object-cover rounded-lg mx-auto border">
            </td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center gap-2">
                    <!-- View Icon -->
                    <a href="{{ route('facilities.show', $item->id) }}" 
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center" 
                        title="View Facility">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit Icon -->
                    <a href="{{ route('facilities.edit', $item->id) }}" 
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center" 
                        title="Edit Facility">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Icon -->
                    <button onclick="openDeleteModal('facilities', {{ $item->id }})" 
                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-6 text-gray-500">No facilities found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

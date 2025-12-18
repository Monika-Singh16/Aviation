@extends('admin.layout.master')

@section('title', 'Highlights')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Highlights</h1>
    <a href="{{ route('highlights.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Highlight
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
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Icon</th>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Sub Heading</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Color</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($highlights as $highlight)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $highlight->id }}</td>
            <td class="border px-4 py-2 text-center">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white mx-auto"
                     style="background-color: {{ $highlight->color }}">
                    <i class="{{ $highlight->icon }}"></i>
                </div>
            </td>
            <td class="border px-4 py-2 font-semibold">{{ $highlight->heading }}</td>
            <td class="border px-4 py-2 text-gray-700">{{ $highlight->sub_heading ?? '-' }}</td>
            <td class="border px-4 py-2 text-center">
                @if($highlight->image)
                    <img src="{{ asset('admin-assets/images/home-page/highlights/' . $highlight->image) }}"
                         alt="Highlight Image"
                         class="w-16 h-16 object-cover rounded-lg mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No image</span>
                @endif
            </td>
            <td class="border px-4 py-2 text-center">
                <div class="px-3 py-1 rounded text-white font-semibold"
                     style="background-color: {{ $highlight->color }}">
                     {{ $highlight->color }}
                </div>
            </td>

            <td class="border px-4 py-2 flex gap-2 justify-center">
                <!-- Edit -->
                <a href="{{ route('highlights.edit', $highlight->id) }}"
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- View -->
                <a href="{{ route('highlights.show', $highlight->id) }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Delete -->
                <form action="{{ route('highlights.destroy', $highlight->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this highlight?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center py-4 text-gray-600">No Highlights Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

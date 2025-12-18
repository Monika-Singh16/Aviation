@extends('admin.layout.master')

@section('title', 'Advantage')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Advantage</h1>
    <a href="{{ route('advantage.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Advantage
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
            <th class="border px-4 py-2">Sub Title</th>
            <th class="border px-4 py-2">Banner Image</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($advantages as $advantage)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $advantage->id }}</td>
            <td class="border px-4 py-2 text-center">{{ $advantage->sub_title }}</td>
            <td class="border px-4 py-2 text-center">
                @if($advantage->banner_image)
                    <img src="{{ asset($advantage->banner_image) }}" 
                        class="w-16 h-16 object-cover rounded mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No Image</span>
                @endif
            </td>

            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $advantage->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $advantage->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center gap-2">
                    <!-- View -->
                    <a href="{{ route('advantage.show', $advantage->id) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('advantage.edit', $advantage->id) }}"
                    class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('advantage.destroy', $advantage->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this record?')">
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
            <td colspan="5" class="text-center py-4 text-gray-600">No Advantage Section Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

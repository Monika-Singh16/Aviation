@extends('admin.layout.master')

@section('title', 'whyvaa Section')

@section('content')

<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">whyvaa Section</h1>

    <a href="{{ route('whyvaa.create') }}" 
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add whyvaa
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
            <th class="border px-4 py-2">Main Title</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($whyvaa as $item)
        <tr class="hover:bg-gray-50">

            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>

            <td class="border px-4 py-2">{{ $item->main_title }}</td>

            <td class="border px-4 py-2 text-center">
                @if($item->image)
                    <img src="{{ asset($item->image) }}" 
                        class="w-16 h-16 object-cover rounded mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No Image</span>
                @endif
            </td>

            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $item->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="px-4 py-3 border">
                <div class="flex flex-wrap gap-2 justify-center">

                    <a href="{{ route('whyvaa.show', $item->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('whyvaa.edit', $item->id) }}" 
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('whyvaa.destroy', $item->id) }}" 
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
            <td colspan="5" class="text-center py-4 text-gray-600">
                No WhyVaa Data Found
            </td>
        </tr>
        @endforelse

    </tbody>
</table>
@endsection

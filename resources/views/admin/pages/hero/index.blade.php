@extends('admin.layout.master')

@section('title', 'hero Section')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">hero Section</h1>

    <a href="{{ route('hero.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add hero
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
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Sub Title</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($heros as $hero)
        <tr class="hover:bg-gray-50">

            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>

            <td class="border px-4 py-2">{{ $hero->title }}</td>

            <td class="border px-4 py-2">{{ $hero->sub_title }}</td>

            <td class="border px-4 py-2 text-center">
                @if($hero->image)
                    <img src="{{ asset($hero->image) }}" 
                        class="w-16 h-16 object-cover rounded mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No Image</span>
                @endif
            </td>

            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $hero->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $hero->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="border px-4 py-2 text-center align-middle">
                <div class="flex items-center justify-center gap-2">

                    <a href="{{ route('hero.show', $hero->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('hero.edit', $hero->id) }}" 
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('hero.destroy', $hero->id) }}" 
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
            <td colspan="6" class="text-center py-4 text-gray-600">
                No hero Data Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

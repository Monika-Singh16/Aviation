@extends('admin.layout.master')

@section('title', 'why_choose Section')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Why Choose Section</h1>

    <a href="{{ route('why_choose.create') }}" 
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Why Choose
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
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($why_chooses as $why_choose)
        <tr class="hover:bg-gray-50">

            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>

            <td class="border px-4 py-2">{{ $why_choose->title }}</td>

            {{-- <td class="border px-4 py-2 text-center">
                @if($why_choose->image)
                    <img src="{{ asset($why_choose->image) }}" 
                        class="w-16 h-16 object-cover rounded mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No Image Found</span>
                @endif
            </td> --}}
            <td class="border px-4 py-2 text-center">
                @if($why_choose->image && file_exists(public_path($why_choose->image)))
                    <img src="{{ asset($why_choose->image) }}"
                        class="w-16 h-16 object-cover rounded mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No Image Found</span>
                @endif
            </td>

            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $why_choose->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $why_choose->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="border px-4 py-2 text-center align-middle">
                <div class="flex items-center justify-center gap-2">
                    <a href="{{ route('why_choose.show', $why_choose->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('why_choose.edit', $why_choose->id) }}" 
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('why_choose.destroy', $why_choose->id) }}" 
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
                No Why Choose Data Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

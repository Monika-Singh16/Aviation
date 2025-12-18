@extends('admin.layout.master')

@section('title', 'About Section')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">About Section</h1>
    <a href="{{ route('about.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add About
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
            <th class="border px-4 py-2">Main Image</th>
            <th class="border px-4 py-2">Features</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($abouts as $about)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $about->id }}</td>
            <td class="border px-4 py-2">{{ $about->title }}</td>
            <td class="border px-4 py-2">{{ $about->sub_title }}</td>

            <td class="border px-4 py-2 text-center">
                @if($about->image)
                    <img src="{{ asset($about->image) }}" 
                         alt="About Image" 
                         class="w-16 h-16 object-cover rounded-lg mx-auto border">
                @else
                    <span class="text-gray-500 text-sm">No image</span>
                @endif
            </td>

            <td class="border px-4 py-2">
                @foreach($about->features ?? [] as $feature)
                    <li class="text-gray-700 text-sm list-disc ml-4">{{ $feature }}</li>
                @endforeach
            </td>

            <td class="border px-4 py-2 flex gap-2 justify-center">
                <!-- Edit Icon -->
                <a href="{{ route('about.edit', $about->id) }}" 
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- View Icon (Eye) -->
                <a href="{{ route('about.show', $about->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full  w-10 h-10 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <!-- <i class="fas fa-eye"></i> -->
                </a>

                <!-- Delete Icon -->
                <form action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
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
            <td colspan="6" class="text-center py-4 text-gray-600">No About Data Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

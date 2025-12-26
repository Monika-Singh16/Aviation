@extends('admin.layout.master')
@section('title', 'Infos')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Infos</h1>
    <a href="{{ route('infos.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        + Add Info
    </a>
</div>

<table class="w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Course</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($infos as $info)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $info->id }}</td>
            <td class="border px-4 py-2">{{ $info->course->course_name ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $info->title }}</td>

            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white
                    {{ $info->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $info->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="border px-4 py-2">
                <div class="flex gap-2 justify-center">
                    <a href="{{ route('infos.show', $info->id) }}"
                        class="bg-blue-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('infos.edit', $info->id) }}"
                        class="bg-green-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('infos.destroy', $info->id) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this info?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-4 text-gray-500">
                No Infos Found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

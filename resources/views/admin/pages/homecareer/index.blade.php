@extends('admin.layout.master')

@section('title', 'Home Careers')

@section('content')
<h1 class="text-2xl font-bold mb-6">Home Careers List</h1>

<a href="{{ route('homecareer.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded mb-4 inline-block">
    Add New Home Career
</a>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-6 shadow-sm">
        {{ session('success') }}
    </div>
@endif

@if($homeCareers->count())
<table class="min-w-full table-auto bg-white shadow rounded">
    <thead>
        <tr>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($homeCareers as $homeCareer)
        <tr>
            <td class="border px-4 py-2">{{ $homeCareer->heading }}</td>
            <td class="border px-4 py-2">{{ Str::limit($homeCareer->description, 50) }}</td>
            <td class="border px-4 py-2 space-x-2 flex justify-center items-center gap-2">
                <a href="{{ route('homecareer.show', $homeCareer->id) }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center" 
                   title="View Home Career">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('homecareer.edit', $homeCareer->id) }}" 
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center" 
                   title="Edit Home Career">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('homecareer.destroy', $homeCareer->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure to delete this entry?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center" title="Delete Home Career">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-gray-600">No Home Career entries found.</p>
@endif

@endsection

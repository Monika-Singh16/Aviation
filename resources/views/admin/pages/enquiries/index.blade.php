@extends('admin.layout.master')

@section('title', 'Enquiries')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Enquiries</h1>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Course</th>
            <th class="border px-4 py-2">Mobile</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($enquiries as $enquiry)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $enquiry->first_name }} {{ $enquiry->last_name }}</td>
            <td class="border px-4 py-2">{{ $enquiry->course->course_name ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $enquiry->mobile }}</td>

            <!-- Actions -->
            <td class="border px-4 py-2">
                <div class="flex gap-2 justify-center">
                    <!-- View -->
                    <a href="{{ route('enquiries.show', $enquiry->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
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
            <td colspan="5" class="text-center py-4 text-gray-500">
                No enquiries found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

@extends('admin.layout.master')

@section('title', 'FAQs List')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold mb-6">FAQs List</h1>

    <a href="{{ route('faq.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
        Add New FAQ
    </a>
</div>

@if($faqs->count())
<table class="w-full table-auto bg-white shadow rounded">
    <thead>
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Question</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faqs as $faq)
        <tr>
            <td class="border px-4 py-2 text-center">{{ $faq->id }}</td>
            <td class="border px-4 py-2">{{ $faq->heading }}</td>
            <td class="border px-4 py-2">{{ $faq->question }}</td>
            <td class="border px-4 py-2 text-center">
                <span class="px-3 py-1 rounded text-white 
                    {{ $faq->is_active ? 'bg-green-600' : 'bg-red-500' }}">
                    {{ $faq->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>
            <td class="border px-4 py-2 space-x-2 text-center">
                <div class="flex items-center justify-center gap-2">
                    <a href="{{ route('faq.show', $faq->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="View FAQ">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('faq.edit', $faq->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                        title="Edit FAQ">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure to delete this FAQ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                                title="Delete FAQ">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No FAQs found.</p>
@endif

@endsection

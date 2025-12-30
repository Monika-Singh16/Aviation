@extends('admin.layout.master')

@section('title', 'Contact Form Inquiries')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Contact Form Inquiries</h1>
            <p class="text-gray-600 mt-1">Manage and view all contact form submissions</p>
        </div>
        
        <!-- Stats Card (Optional) -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg shadow-lg">
            <p class="text-sm font-medium">Total Inquiries</p>
            <p class="text-2xl font-bold">{{ $contacts->count() }}</p>
        </div>
    </div>

    <!-- Filter Section (Optional - can be added later) -->
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <div class="flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[200px]">
                <input type="text" placeholder="Search by name..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Filter by Course</option>
                    <option value="all">All Courses</option>
                </select>
            </div>
            
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200 shadow-md">
                <i class="fas fa-search mr-2"></i>Search
            </button>
            
            <button class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition duration-200 shadow-md">
                <i class="fas fa-redo mr-2"></i>Reset
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-700 to-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">
                            Course
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">
                            Source
                        </th>
                        <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-blue-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $contact->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $contact->phone ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $contact->email ?? 'N/A' }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $contact->course->course_name ?? 'N/A' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $contact->source === 'Website' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ $contact->source ?? 'Unknown' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-600">
                                <div class="flex flex-col items-center">
                                    <i class="far fa-calendar-alt text-gray-400 mb-1"></i>
                                    <span>{{ $contact->created_at->format('d M Y') }}</span>
                                    <span class="text-xs text-gray-400">{{ $contact->created_at->format('h:i A') }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.pages.contact_form.show', $contact->id) }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 shadow-md inline-flex items-center"
                                        title="View Details">
                                        <i class="fas fa-eye mr-1"></i>
                                        <span class="hidden md:inline">View</span>
                                    </a>
                                    
                                    <!-- Optional: Delete Button -->
                                    {{-- <form action="{{ route('admin.pages.contact_form.destroy', $contact->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('Are you sure you want to delete this inquiry?')"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200 shadow-md inline-flex items-center"
                                            title="Delete">
                                            <i class="fas fa-trash mr-1"></i>
                                            <span class="hidden md:inline">Delete</span>
                                        </button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                                        <i class="fas fa-inbox text-3xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-1">No inquiries found</h3>
                                    <p class="text-gray-500">There are no contact form submissions yet.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination (if using pagination) -->
        {{-- <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            {{ $contacts->links() }}
        </div> --}}
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Custom scrollbar for table */
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
@endpush
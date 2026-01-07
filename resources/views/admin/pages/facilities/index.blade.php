@extends('admin.layout.master')

@section('title', 'Facilities')

@section('content')
<div>
    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Facilities</h1>

        <a href="{{ route('facilities.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Add Facility
        </a>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE -->
    <div>
        <table class="w-full border border-collapse border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Heading</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($facilities as $facility)
                    <tr class="hover:bg-gray-50">
                        <!-- ID -->
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>

                        <!-- IMAGE -->
                        <td class="border px-4 py-2">
                            @if($facility->image)
                                <img src="{{ asset('admin-assets/facility-page/'.$facility->image) }}"
                                    class="w-20 h-14 object-cover rounded mx-auto">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>

                        <!-- HEADING -->
                        <td class="border px-4 py-2">
                            {{ $facility->heading ?? '-' }}
                        </td>

                        <!-- STATUS -->
                        <td class="border px-4 py-2 text-center">
                            <span class="px-3 py-1 rounded text-white text-xs
                                {{ $facility->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                                {{ $facility->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <!-- ACTIONS -->
                        <td class="border px-4 py-2 text-center align-middle">
                            <div class="flex items-center justify-center gap-2">
                                <!-- View -->
                                <a href="{{ route('facilities.show', $facility->id) }}"
                                title="View Facility" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                        <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('facilities.edit', $facility->id) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                                    title="Edit Facility">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Add About-->
                                <a href="{{ route('facility_hero.create', ['facility_id' => $facility->id]) }}"
                                    class="bg-purple-500 hover:bg-purple-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                                    title="Add Facility About">
                                    <i class="fa-solid fa-star"></i>
                                </a>

                                <!-- Add Aircraft -->
                                <a href="{{ route('aircraft.create', ['facility_id' => $facility->id]) }}"
                                    class="bg-teal-500 hover:bg-teal-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                                    title="Add Aircrafts">
                                    <i class="fas fa-clipboard-list"></i>
                                </a>

                                <form action="{{ route('facilities.destroy', $facility->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                                        title="Delete facility">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">
                            No facilities found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

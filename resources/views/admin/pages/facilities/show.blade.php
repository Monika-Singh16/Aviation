@extends('admin.layout.master')
@section('title', 'View Facility')

@section('content')
<div class="p-6 bg-white rounded shadow space-y-6">

    <h1 class="text-2xl font-bold">{{ $facility->heading }}</h1>

    <p><strong>Note:</strong> {{ $facility->note }}</p>
    <p><strong>Status:</strong>
        <span class="px-2 py-1 rounded {{ $facility->is_active ? 'bg-green-200' : 'bg-red-200' }}">
            {{ $facility->is_active ? 'Active' : 'Inactive' }}
        </span>
    </p>
    <div>
        <p class="font-semibold text-gray-700">Facility URL (Slug):</p>
        <p class="text-gray-900">{{ $facility->facilities_url }}</p>
    </div>

    <p><strong>Short Description:</strong> {{ $facility->short_description }}</p>

    @if($facility->image)
        <div>
            <h2 class="font-bold text-gray-700">Image:</h2>
            <img src="{{ asset('admin-assets/facility-page/'.$facility->image) }}"
                class="w-60 h-60 object-cover rounded-xl shadow-md mt-3 border border-gray-200">
        </div>
    @endif

    {{-- <h2 class="text-xl font-semibold">Facilities</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($facility->facilities as $item)
            <div class="border p-4 rounded bg-gray-50">
                <p><strong>Icon:</strong> {{ $item['icon'] }}</p>
                <p><strong>Title:</strong> {{ $item['title'] }}</p>
                <p><strong>Description:</strong> {{ $item['description'] }}</p>
            </div>
        @endforeach
    </div> --}}
    <h2 class="text-xl font-semibold">Facilities</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @if(!empty($facility->features))
            @foreach($facility->features as $item)
                <div class="border p-4 rounded bg-gray-50">
                    <p><strong>Icon:</strong> {{ $item['icon'] ?? '' }}</p>
                    <p><strong>Title:</strong> {{ $item['title'] ?? '' }}</p>
                    <p><strong>Description:</strong> {{ $item['description'] ?? '' }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <a href="{{ route('facilities.index') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded">
        Back
    </a>
</div>
@endsection

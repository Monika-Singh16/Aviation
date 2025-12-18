@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="p-4">
  <h2 class="text-2xl font-bold mb-4 text-gray-800">Dashboard</h2>

  <!-- Example dashboard cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-green-200 shadow-md rounded-lg p-5 border-b-4 border-green-600">
      <div class="flex items-center">
        <div class="bg-green-600 text-white p-3 rounded-full mr-4">
          <i class="fa-solid fa-wallet"></i>
        </div>
        <div>
          <h3 class="text-gray-700 font-semibold">Total Revenue</h3>
          <p class="text-2xl font-bold">$3249</p>
        </div>
      </div>
    </div>

    <div class="bg-pink-200 shadow-md rounded-lg p-5 border-b-4 border-pink-600">
      <div class="flex items-center">
        <div class="bg-pink-600 text-white p-3 rounded-full mr-4">
          <i class="fa-solid fa-users"></i>
        </div>
        <div>
          <h3 class="text-gray-700 font-semibold">Total Users</h3>
          <p class="text-2xl font-bold">249</p>
        </div>
      </div>
    </div>

    <div class="bg-yellow-200 shadow-md rounded-lg p-5 border-b-4 border-yellow-500">
      <div class="flex items-center">
        <div class="bg-yellow-500 text-white p-3 rounded-full mr-4">
          <i class="fa-solid fa-user-plus"></i>
        </div>
        <div>
          <h3 class="text-gray-700 font-semibold">New Users</h3>
          <p class="text-2xl font-bold">2</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

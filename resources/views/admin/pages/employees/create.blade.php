@extends('admin.layout.master')
@section('title', 'Add Employee')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Employee</h1>

<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
                <!-- Name -->
    <div>
        <label for="name" class="block mb-1 font-semibold">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
              @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror  
    </div>

                <!-- Email -->
    <div>
        <label for="email" class="block mb-1 font-semibold">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter Email" 
               class="w-1/2 border p-2 rounded-lg  border-gray-400 shadow-sm" required>
                @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

                <!-- Password -->
    <!-- <div>
        <label for="password" class="block mb-1 font-semibold">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
                @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div> -->

    <div class="relative w-1/2">
        <label for="password" class="block mb-1 font-semibold">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" 
           class="w-full border p-2 pr-10 rounded-lg border-gray-400 shadow-sm" required>
    
        <!-- Eye icon -->
        <i class="fa-solid fa-eye absolute right-3 top-[38px] cursor-pointer text-gray-500" id="togglePassword"></i>

        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

                <!-- Contact number -->
    <div>
        <label for="contact_no" class="block mb-1 font-semibold">Contact number</label>
        <input type="tel" name="contact_no" id="contact_no" placeholder="Enter Contact no" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
                @error('contact_no')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    
              

                <!-- Role -->
    <div>
        <label for="role_id" class="block mb-1 font-semibold">Role</label>
        <select name="role_id" id="role_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        {{-- Validation Error --}}
        @error('role_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

           

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg w-[120px] ">Save</button>
</form>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.classList.toggle('fa-eye-slash'); // toggles eye/eye-slash icon
    });
</script>
@endsection

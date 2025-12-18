<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Step 1: Create the Admin role (only if it doesn't exist)
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Step 2: Create the Admin employee (only if it doesn't exist)
        Employee::firstOrCreate(
            ['email' => 'aviation@gmail.com'], // avoid duplicate
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
                'role_id' => $role->id, // assign Admin role
            ]
        );
    }
}


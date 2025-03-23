<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the user already exists
        if (!User::where('username', 'superadmin')->exists()) {
            User::create([
                'name' => 'superadmin',
                'username' => 'superadmin',
                'email' => 'superadmin@codebase.np',
                'password' => Hash::make('Codebase@0802'),
                'is_active' => true,
            ]);
        }
    }
}

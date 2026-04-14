<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@scholartrack.local'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Assign the admin role
        $admin->assignRole('admin');

        // Create additional staff user
        $staff = User::firstOrCreate(
            ['email' => 'staff@scholartrack.local'],
            [
                'name' => 'Staff Member',
                'password' => Hash::make('password'),
            ]
        );
        $staff->assignRole('staff');
    }
}

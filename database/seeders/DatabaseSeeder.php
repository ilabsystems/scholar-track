<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        // Create users for each role
        $users = [
            [
                'name' => 'Scholar User',
                'email' => 'scholar@example.com',
                'role' => 'scholar',
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'role' => 'staff',
            ],
            [
                'name' => 'Reviewer User',
                'email' => 'reviewer@example.com',
                'role' => 'reviewer',
            ],
            [
                'name' => 'Finance User',
                'email' => 'finance@example.com',
                'role' => 'finance',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::factory()->create([
                'name' => $userData['name'],
                'email' => $userData['email'],
            ]);

            $user->assignRole($userData['role']);
        }
    }
}

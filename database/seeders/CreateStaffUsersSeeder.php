<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateStaffUsersSeeder extends Seeder
{
    public function run(): void
    {
        $municipality = User::firstOrCreate(
            ['email' => 'municipality@scholartrack.local'],
            [
                'name'     => 'Municipality',
                'password' => Hash::make('password'),
            ]
        );
        $municipality->assignRole('municipality');

        $peso = User::firstOrCreate(
            ['email' => 'peso@scholartrack.local'],
            [
                'name'     => 'PESO Officer',
                'password' => Hash::make('password'),
            ]
        );
        $peso->assignRole('peso_officer');
    }
}

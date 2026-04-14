<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateApplicantUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applicants = [
            [
                'name' => 'John Doe',
                'email' => 'applicant@scholartrack.local',
                'password' => 'password',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria.garcia@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Carlos Rodriguez',
                'email' => 'carlos.rodriguez@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'password' => 'password',
            ],
        ];

        foreach ($applicants as $applicantData) {
            $user = User::firstOrCreate(
                ['email' => $applicantData['email']],
                [
                    'name' => $applicantData['name'],
                    'password' => Hash::make($applicantData['password']),
                ]
            );

            // Assign the applicant role
            $user->assignRole('applicant');
        }
    }
}

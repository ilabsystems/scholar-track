<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\ApplicantProfile;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create demo scholarships
        $scholarships = [
            [
                'name' => 'STEM Excellence Scholarship',
                'description' => 'For outstanding students in Science, Technology, Engineering, and Mathematics fields.',
                'amount' => 5000.00,
                'criteria' => 'Minimum GPA 3.5, STEM major, demonstrated leadership',
                'deadline' => now()->addDays(30),
                'award_type' => 'annual',
                'coverage' => 'tuition',
                'gpa_requirement' => 3.5,
                'demographics' => 'undergraduate',
                'field_of_study' => 'STEM',
                'status' => 'active',
                'created_by' => User::where('email', 'admin@scholartrack.local')->first()->id,
            ],
            [
                'name' => 'Community Leadership Award',
                'description' => 'Recognizing students who demonstrate exceptional community service and leadership.',
                'amount' => 2500.00,
                'criteria' => 'Community service hours, leadership roles, minimum GPA 3.0',
                'deadline' => now()->addDays(45),
                'award_type' => 'semester',
                'coverage' => 'books',
                'gpa_requirement' => 3.0,
                'demographics' => 'undergraduate',
                'field_of_study' => 'any',
                'status' => 'active',
                'created_by' => User::where('email', 'admin@scholartrack.local')->first()->id,
            ],
            [
                'name' => 'First Generation Student Fund',
                'description' => 'Supporting first-generation college students in their academic journey.',
                'amount' => 3000.00,
                'criteria' => 'First-generation student, minimum GPA 2.5, demonstrated financial need',
                'deadline' => now()->addDays(60),
                'award_type' => 'annual',
                'coverage' => 'tuition',
                'gpa_requirement' => 2.5,
                'demographics' => 'undergraduate',
                'field_of_study' => 'any',
                'status' => 'active',
                'created_by' => User::where('email', 'admin@scholartrack.local')->first()->id,
            ],
        ];

        foreach ($scholarships as $scholarshipData) {
            Scholarship::firstOrCreate(
                ['name' => $scholarshipData['name']],
                $scholarshipData
            );
        }

        // Create demo applicant profiles
        $applicantUsers = User::role('applicant')->get();

        foreach ($applicantUsers as $user) {
            ApplicantProfile::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => '+1' . rand(1000000000, 9999999999),
                    'address' => rand(100, 999) . ' Main St, City, State ' . rand(10000, 99999),
                    'date_of_birth' => now()->subYears(rand(18, 25)),
                    'field_of_study' => collect(['Computer Science', 'Engineering', 'Business', 'Biology', 'Psychology'])->random(),
                    'gpa' => rand(25, 40) / 10, // 2.5 to 4.0
                    'education_level' => 'undergraduate',
                    'employment_status' => collect(['student', 'part-time', 'unemployed'])->random(),
                    'household_income' => rand(20000, 150000),
                ]
            );
        }

        // Create demo applications with different statuses
        $scholarship1 = Scholarship::where('name', 'STEM Excellence Scholarship')->first();
        $scholarship2 = Scholarship::where('name', 'Community Leadership Award')->first();
        $scholarship3 = Scholarship::where('name', 'First Generation Student Fund')->first();

        $applications = [
            // Approved application
            [
                'user_id' => $applicantUsers->first()->id,
                'scholarship_id' => $scholarship1->id,
                'applicant_profile_id' => $applicantUsers->first()->applicantProfile->id,
                'status' => 'approved',
                'cover_letter' => 'I am passionate about computer science and have maintained a 3.8 GPA...',
                'essay_response' => 'My goal is to become a software engineer and contribute to innovative solutions...',
                'score' => 92.5,
                'remarks' => 'Excellent academic record and clear career goals. Highly recommended.',
                'assigned_to' => User::where('email', 'staff@scholartrack.local')->first()->id,
                'reviewed_by' => User::where('email', 'admin@scholartrack.local')->first()->id,
                'submitted_at' => now()->subDays(5),
                'reviewed_at' => now()->subDays(2),
            ],
            // Rejected application
            [
                'user_id' => $applicantUsers->skip(1)->first()->id,
                'scholarship_id' => $scholarship1->id,
                'applicant_profile_id' => $applicantUsers->skip(1)->first()->applicantProfile->id,
                'status' => 'rejected',
                'cover_letter' => 'I would like to apply for this scholarship to help with my studies...',
                'essay_response' => 'Education is important to me and I want to succeed in college...',
                'score' => 65.0,
                'remarks' => 'GPA below minimum requirement. Essay lacks specific goals and achievements.',
                'assigned_to' => User::where('email', 'staff@scholartrack.local')->first()->id,
                'reviewed_by' => User::where('email', 'admin@scholartrack.local')->first()->id,
                'submitted_at' => now()->subDays(7),
                'reviewed_at' => now()->subDays(3),
            ],
            // Under review application
            [
                'user_id' => $applicantUsers->skip(2)->first()->id,
                'scholarship_id' => $scholarship2->id,
                'applicant_profile_id' => $applicantUsers->skip(2)->first()->applicantProfile->id,
                'status' => 'under_review',
                'cover_letter' => 'Throughout my college years, I have been actively involved in community service...',
                'essay_response' => 'Leadership is about serving others and making a positive impact...',
                'assigned_to' => User::where('email', 'staff@scholartrack.local')->first()->id,
                'submitted_at' => now()->subDays(1),
            ],
            // Submitted application
            [
                'user_id' => $applicantUsers->skip(3)->first()->id,
                'scholarship_id' => $scholarship3->id,
                'applicant_profile_id' => $applicantUsers->skip(3)->first()->applicantProfile->id,
                'status' => 'submitted',
                'cover_letter' => 'As a first-generation college student, I face unique challenges...',
                'essay_response' => 'My family has always emphasized the importance of education...',
                'submitted_at' => now()->subHours(6),
            ],
            // Draft application
            [
                'user_id' => $applicantUsers->skip(4)->first()->id,
                'scholarship_id' => $scholarship2->id,
                'applicant_profile_id' => $applicantUsers->skip(4)->first()->applicantProfile->id,
                'status' => 'draft',
                'cover_letter' => 'I am writing to express my interest in the Community Leadership Award...',
                'essay_response' => '', // Empty draft
            ],
        ];

        foreach ($applications as $applicationData) {
            Application::firstOrCreate(
                [
                    'user_id' => $applicationData['user_id'],
                    'scholarship_id' => $applicationData['scholarship_id']
                ],
                $applicationData
            );
        }
    }
}
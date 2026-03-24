<?php

namespace Database\Factories;

use App\Models\ApplicantProfile;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScholarProfile>
 */
class ScholarProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'applicant_profile_id' => ApplicantProfile::factory(),
            'scholarship_id' => Scholarship::factory(),
            'award_amount' => $this->faker->randomFloat(2, 5000, 50000),
            'start_date' => $this->faker->dateTimeBetween('+1 month', '+3 months')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('+1 year', '+4 years')->format('Y-m-d'),
            'status' => 'active',
            'mentor_info' => $this->faker->sentence(),
            'approval_date' => now()->format('Y-m-d'),
            'approved_by' => $this->faker->name(),
            'approval_remarks' => $this->faker->sentence(),
        ];
    }

    /**
     * Indicate that the scholar has completed their program.
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
            'end_date' => now()->subMonths(3)->format('Y-m-d'),
        ]);
    }

    /**
     * Indicate that the scholar is on pause.
     */
    public function paused(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paused',
        ]);
    }
}

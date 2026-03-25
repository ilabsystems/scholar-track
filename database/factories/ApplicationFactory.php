<?php

namespace Database\Factories;

use App\Models\ApplicantProfile;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
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
            'scholarship_id' => Scholarship::factory(),
            'applicant_profile_id' => null,
            'status' => 'draft',
            'cover_letter' => fake()->optional()->paragraphs(2, true),
            'essay_response' => fake()->optional()->paragraphs(3, true),
            'documents' => null,
            'score' => null,
            'remarks' => null,
            'assigned_to' => null,
            'reviewed_by' => null,
            'submitted_at' => null,
            'reviewed_at' => null,
        ];
    }

    public function submitted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);
    }

    public function underReview(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'under_review',
            'submitted_at' => now()->subDays(7),
        ]);
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'approved',
            'submitted_at' => now()->subDays(14),
            'reviewed_at' => now(),
            'score' => fake()->randomFloat(2, 70, 100),
        ]);
    }

    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
            'submitted_at' => now()->subDays(14),
            'reviewed_at' => now(),
            'remarks' => fake()->sentence(),
        ]);
    }

    public function withProfile(): static
    {
        return $this->state(fn (array $attributes) => [
            'applicant_profile_id' => ApplicantProfile::factory(),
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholarship>
 */
class ScholarshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraphs(2, true),
            'amount' => fake()->numberBetween(10000, 100000),
            'criteria' => fake()->sentences(3, true),
            'deadline' => fake()->dateTimeBetween('+1 month', '+6 months'),
            'award_type' => fake()->randomElement(['one-time', 'yearly', 'monthly']),
            'coverage' => fake()->randomElement(['full-tuition', 'partial', 'books', 'other']),
            'gpa_requirement' => fake()->randomFloat(1, 2, 4),
            'demographics' => fake()->optional()->words(2, true),
            'field_of_study' => fake()->optional()->words(2, true),
            'status' => 'draft',
            'created_by' => User::factory(),
        ];
    }
}

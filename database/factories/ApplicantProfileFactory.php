<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantProfile>
 */
class ApplicantProfileFactory extends Factory
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
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'date_of_birth' => $this->faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'field_of_study' => $this->faker->randomElement(['Engineering', 'Medicine', 'Business', 'Education', 'Law', 'Computer Science']),
            'gpa' => $this->faker->randomFloat(2, 2.5, 4.0),
            'education_level' => $this->faker->randomElement(['High School', 'Associate Degree', 'Bachelor Degree']),
            'employment_status' => $this->faker->randomElement(['Student', 'Unemployed', 'Part-time', 'Full-time']),
            'household_income' => $this->faker->randomFloat(2, 15000, 75000),
            'essay_response' => $this->faker->paragraphs(3, true),
            'documents' => ['transcript', 'recommendation_letter', 'essay'],
        ];
    }
}

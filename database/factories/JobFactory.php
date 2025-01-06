<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Add all the table columns here from job_listings
            // Link employer_id to the Employer and recycle existing employers.
            'employer_id' => Employer::inRandomOrder()->first()->id ?? Employer::factory(),
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'location' => fake()->city() . ', ' . fake()->state(),
            'salary' => '$' . fake()->randomFloat(2, 1000, 100000)  . ' USD' . fake()->randomElement([' per year', ' per month']),
            'created_at' => fake()->dateTime(),
        ];
    }
}

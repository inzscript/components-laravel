<?php

namespace Database\Factories;

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
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'location' => fake()->city() . ', ' . fake()->state(),
            'salary' => fake()->randomFloat(2, 1000, 100000)  . ' ' . fake()->currencyCode() . fake()->randomElement([' per year', ' per month']),
            'created_at' => fake()->dateTime(),
        ];
    }
}

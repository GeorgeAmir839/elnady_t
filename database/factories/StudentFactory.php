<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $levelIds = \App\Models\Level::pluck('id')->toArray();
        return [
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'date_of_birth' => fake()->date(),
            'code' => fake()->unique()->numberBetween(9999,1000000),
            'level_id' => $this->faker->randomElement($levelIds), // Assign a random level_id

        ];
    }
}

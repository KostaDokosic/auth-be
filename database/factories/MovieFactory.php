<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'director' => fake()->name(),
            'image_url' => fake()->imageUrl(),
            'duration' => fake()->numberBetween(1, 150),
            'release_date' => fake()->date(),
            'genre' => fake()->word(),
        ];
    }
}

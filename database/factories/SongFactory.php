<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realTextBetween(5,30,2),
            'artist_id' => fake()->numberBetween(1,104), //randomNumber() //artist_id length
            'duration' => fake()->numberBetween(2*60, 5*60),
        ];
    }
}

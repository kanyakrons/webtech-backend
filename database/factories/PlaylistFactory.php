<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => fake()->numberBetween(1,103), //randomNumber() //user_id length
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Playlist $playlist) {
            $songIds = Song::inRandomOrder()->take(rand(0, 105))->pluck('id')->toArray();   //rand(1, maxSong)
            $playlist->songs()->attach($songIds);
        });
    }
}

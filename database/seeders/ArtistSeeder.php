<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artist = new Artist();
        $artist->name = "Miley Cyrus";
        $artist->image_path = null;
        $artist->save();

        $artist = new Artist();
        $artist->name = "Lee Isaacs";
        $artist->image_path = null;
        $artist->save();

        $artist = new Artist();
        $artist->name = "Getsunova";
        $artist->image_path = null;
        $artist->save();

        $artist = new Artist();
        $artist->name = "wave to earth";
        $artist->image_path = null;
        $artist->save();

        Artist::factory(100)->create();
    }
}

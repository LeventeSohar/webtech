<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalsTableSeeder extends Seeder
{
    public function run()
    {
        Animal::create([
            'type' => 'dog',
            'size' => 'small',
            'age' => 3,
            'color' => 'white',
            'description' => 'Our little Cheeko is a class for himself. He has a big personality for such a small body. If you look for a funny, sassy and chill dog to accopmany you at your everyday life - then Cheeko could be the one for you.',
            'garden_needed' => false,
            'picture' => '/public/images/Dog1.png',
        ]);

        Animal::create([
            'type' => 'cat',
            'size' => null,
            'age' => 4,
            'color' => 'black',
            'description' => 'Hunter is a rather independent cat that would like to live in a quit home without kids or other animals.',
            'garden_needed' => false,
            'picture' => '/public/images/Cat1.png',
        ]);
    }
}

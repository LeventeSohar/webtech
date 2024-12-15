<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlockedWord;

class BlockedWordsSeeder extends Seeder
{
    public function run()
    {
        $words = ['fuck', 'bitch', 'ugly']; //blocked words here

        foreach ($words as $word) {
            BlockedWord::create(['word' => $word]);
        }
    }
}

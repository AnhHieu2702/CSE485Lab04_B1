<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;

class BookSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 15; $i++) {
            Book::create([
                'name' => $faker->words(3, true),
                'author' => $faker->name,
                'category' => $faker->word,
                'year' => $faker->year('1900'),
                'quantity' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}

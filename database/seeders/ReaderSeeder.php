<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reader;
use Faker\Factory as Faker;

class ReaderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Reader::create([
                'name' => $faker->name,
                'birthday' => $faker->date('Y-m-d', '-18 years'),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
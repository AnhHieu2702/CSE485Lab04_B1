<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Reader;
class ReaderSeeder extends Seeder
{
    

    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 15; $i++) {
            $reader = Reader::create([
                'name' => $faker->name,
                'birthday' => $faker->date(),
                'address' =>  $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}

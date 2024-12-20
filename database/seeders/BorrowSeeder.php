<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;

class BorrowSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = Faker::create();
        $readerIds = Reader::pluck('id')->toArray();
        $bookIds = Book::pluck('id')->toArray();
        for ($i = 0; $i < 15; $i++) {
            Borrow::create([
                'reader_id' => $faker->randomElement($readerIds), // Chọn ID hợp lệ từ bảng readers
            'book_id' => $faker->randomElement($bookIds),  
                'borrow_date' => $faker->date(),
                'return_date' => $faker->date(),
                'status' => $faker->randomElement([0, 1]),
            ]);
        }
    }
}

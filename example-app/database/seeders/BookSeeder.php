<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 50; $i++) {
            Book::create([
                'name' => str_replace('.', '', $faker->sentence(rand(2,5))),
                'author' => $faker->name,
                'publication_date' => $faker->date,
                'description' => $faker->text,
                'count' => rand(1,25),
                //'book_category' => fetch book category and random it
            ]);
        }
    }
}

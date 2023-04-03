<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        // insert data ke table pegawai
        DB::table('books')->insert([
            'title' => $faker->word,
            'body' => $faker->sentence,
            'rating' => $faker->randomFloat(2, 0, 5),
            // $faker->numberBetween(0,6),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}

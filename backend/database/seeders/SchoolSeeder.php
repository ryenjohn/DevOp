<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

for ($i = 0; $i < 10; $i++) {
    DB::table('schools')->insert([
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'img' => $faker->imageUrl($width = 640, $height = 480),
        'type_education_id' => $faker->numberBetween($min = 1, $max = 5),
        'address_id' => $faker->numberBetween($min = 1, $max = 25),
    ]);
}
    }
}

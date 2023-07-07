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
        $universityName = $faker->company . ' University';
        $img = $faker->imageUrl($width = 640, $height = 480);
        $typeEducationId = $faker->numberBetween($min = 1, $max = 6);
        $addressId = $faker->numberBetween($min = 1, $max = 10);

        DB::table('schools')->insert([
            'name' => $universityName,
            'img' => $img,
            'type_education_id' => $typeEducationId,
            'address_id' => $addressId,
        ]);
}
    }
}

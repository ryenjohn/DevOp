<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $skillName = $faker->jobTitle;
            $imgUrl = $faker->imageUrl($width = 640, $height = 480);
            $addressId = $faker->numberBetween($min = 1, $max = 10);
            $schoolId = $faker->numberBetween($min = 1, $max = 10);
            $description = $faker->sentence;
            $startDate = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now')->format('Y-m-d');
            $expiredDate = $faker->dateTimeBetween($startDate, '+1 year')->format('Y-m-d');
            $time = $faker->time($format = 'H:i:s', $max = 'now');
        
            DB::table('work_shops')->insert([
                'name' => $skillName,
                'img' => $imgUrl,
                'address_id' => $addressId,
                'school_id' => $schoolId,
                'description' => $description,
                'start_date' => $startDate,
                'expired_date' => $expiredDate,
                'time' => $time,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScholarshipSeeder extends Seeder
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
            $description = $faker->sentence;
            $postDate = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now')->format('Y-m-d');
            $expireDate = $faker->dateTimeBetween($postDate, '+1 year')->format('Y-m-d');
            $schoolId = $faker->numberBetween($min = 1, $max = 10);
            $skillId = $faker->numberBetween($min = 1, $max = 10);
        
            DB::table('scholar_ships')->insert([
                'name' => $skillName,
                'img' => $imgUrl,
                'description' => $description,
                'post_date' => $postDate,
                'expired_date' => $expireDate,
                'school_id' => $schoolId,
                'skill_id' => $skillId,
            ]);
        }
    }
}

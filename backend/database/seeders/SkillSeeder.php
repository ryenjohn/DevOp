<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $skillName = $faker->jobTitle;
            $description = $faker->sentence;
            $img = $faker->imageUrl($width = 640, $height = 480);
        
            DB::table('skills')->insert([
                'name' => $skillName,
                'description' => $description,
                'image' => $img,
            ]);
        }
    }
}

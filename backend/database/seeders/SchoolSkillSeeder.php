<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

    
    for ($i = 0; $i < 10; $i++) {
        $typeEducationId = $faker->numberBetween($min = 1, $max = 6);
        $skillId = $faker->numberBetween($min = 1, $max = 10);
    
        DB::table('school_skill')->insert([
            'school_id' => $typeEducationId,
            'skill_id' => $skillId,
        ]);
        }
    }
}

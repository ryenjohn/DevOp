<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $skillId = $faker->numberBetween($min = 1, $max = 10);
            $subjectId = $faker->numberBetween($min = 1, $max = 10);
        
            DB::table('skill_subject')->insert([
                'skill_id' => $skillId,
                'subject_id' => $subjectId,
            ]);
        }
    }
}

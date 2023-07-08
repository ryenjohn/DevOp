<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
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
            $startTime = $faker->time($format = 'H:i:s', $max = 'now');
            $endTime = $faker->time($format = 'H:i:s', $max = 'now');
            $schoolId = $faker->numberBetween($min = 1, $max = 10);
        
            DB::table('schedules')->insert([
                'name' => $skillName,
                'description' => $description,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'school_id' => $schoolId,
            ]);
        }
        
    }
}

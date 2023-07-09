<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkShopUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $userId = $faker->numberBetween($min = 1, $max = 10);
            $workshopId = $faker->numberBetween($min = 1, $max = 10);
        
            DB::table('workshop_user')->insert([
                'user_id' => $userId,
                'workshop_id' => $workshopId,
            ]);
        }
    }
}

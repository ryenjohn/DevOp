<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $content = $faker->text;
            $schoolId = $faker->numberBetween($min = 1, $max = 10);
            $userId = $faker->numberBetween($min = 1, $max = 10);
        
            DB::table('comments')->insert([
                'content' => $content,
                'school_id' => $schoolId,
                'user_id' => $userId,
            ]);
        }
    }
}

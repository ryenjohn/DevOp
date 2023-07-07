<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

$roles = ['student', 'university_manager'];

for ($i = 0; $i < 10; $i++) {
    DB::table('roles')->insert([
        'name' => $faker->randomElement($roles)
    ]);
}
    }
}

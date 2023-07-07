<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

for ($i = 0; $i < 10; $i++) {
    DB::table('users')->insert([
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'role_id' => $faker->numberBetween(1, 5), // assuming you have 5 roles
        'address_id' => $faker->numberBetween(1, 9), // assuming you have 100 addresses
    ]);
}
    }
}

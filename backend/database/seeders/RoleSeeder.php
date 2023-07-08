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
        $faker->addProvider(new class($faker) extends \Faker\Provider\Base {
            protected static $roles = [
                
                'university_manager',
                'student',
                'admin'
                            
            ];
        
            public function role()
            {
                return static::randomElement(static::$roles);
            }
        });
        
        // Use the custom provider to generate roles
        for ($i = 0; $i < 2; $i++) {
            DB::table('roles')->insert([
                'name' => $faker->role(),
            ]);
        }

$roles = ['student', 'university_manager'];

for ($i = 0; $i < 10; $i++) {
    DB::table('roles')->insert([
        'name' => $faker->randomElement($roles)
    ]);
}

    }
}

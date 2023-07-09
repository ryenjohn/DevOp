<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $faker->addProvider(new class($faker) extends \Faker\Provider\Base {
            protected static $education = [
                
                'university',
                'organization'
           
                            
            ];
        
            public function education()
            {
                return static::randomElement(static::$education);
            }
        });
        
        // Use the custom provider to generate roles
        for ($i = 0; $i < 2; $i++) {
            DB::table('type_education')->insert([
                'name' => $faker->education(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $highSchoolSubjects = array('Math', 'English', 'History', 'Science', 'Foreign Language');
            for ($i = 0; $i < 10; $i++) {
                DB::table('subjects')->insert([
                'name' => $faker->randomElement($highSchoolSubjects),
            ]);
        }
    }
}

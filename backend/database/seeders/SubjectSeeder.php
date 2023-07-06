<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $subjects=[
        ['name'=>"English"],
        ['name'=>"Khmer"],
        ['name'=>"Math"],
        ['name'=>"France"],
        ['name'=>"biology"],
        ['name'=>"chemistry"],
        ['name'=>"physics"],
       ];

       foreach($subjects as $subject){
        Subjects::create($subject);
       }
    }
}

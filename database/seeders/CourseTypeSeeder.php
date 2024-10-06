<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseTypes = [
            ['name' => 'Cours Magistral'],
            ['name' => 'Travaux Pratiques'],
            ['name' => 'Travaux Dirigés'],
            ['name' => 'Activités utiles'],
        ];
        DB::table('course_types')->insert($courseTypes);
    }
}

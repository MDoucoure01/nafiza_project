<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CohortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définir quelques cohortes à insérer
        $cohorts = [
            [
                'name' => 'Cohorte A',
                'slug' => Str::slug('Cohorte A'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte B',
                'slug' => Str::slug('Cohorte B'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte C',
                'slug' => Str::slug('Cohorte C'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte D',
<<<<<<< HEAD
=======
                'slug' => Str::slug('Cohorte D'),
>>>>>>> StudentsManagement
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('cohorts')->insert($cohorts);
    }
}

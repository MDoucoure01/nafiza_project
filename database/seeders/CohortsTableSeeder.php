<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cohorte E',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('cohorts')->insert($cohorts);
    }
}

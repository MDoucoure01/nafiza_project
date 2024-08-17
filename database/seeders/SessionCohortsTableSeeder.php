<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionCohortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définir quelques associations entre cohortes et sessions scolaires
        $sessionCohorts = [
            [
                'cohort_id' => 1,
                'school_session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cohort_id' => 2,
                'school_session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cohort_id' => 1,
                'school_session_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cohort_id' => 3,
                'school_session_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cohort_id' => 4,
                'school_session_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('session__cohorts')->insert($sessionCohorts);
    }
}

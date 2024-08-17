<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolSessions = [
            [
                'name' => 'Session 2024-2025',
                'year' => '2024-2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Session 2023-2024',
                'year' => '2023-2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Session 2022-2023',
                'year' => '2022-2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Session 2021-2022',
                'year' => '2021-2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Session 2020-2021',
                'year' => '2020-2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('school_sessions')->insert($schoolSessions);
    }
}

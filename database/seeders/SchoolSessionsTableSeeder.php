<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchoolSessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolSessions = [
            [
                'name' => 'Session 2023',
                'slug' => Str::slug('Session 2023'),
                'start_date' => '2023-02-19',
                'end_date' => '2023-11-11',
                'status' => 1,
                'description' => 'Session expirée...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Session 2024-2025',
                'slug' => Str::slug('Session 2024-2025'),
                'start_date' => '2024-10-22',
                'end_date' => '2025-05-01',
                'status' => 0,
                'description' => 'Session actuelle...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('school_sessions')->insert($schoolSessions);
    }
}

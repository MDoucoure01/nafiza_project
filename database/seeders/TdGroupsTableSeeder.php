<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TdGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définir des groupes de TD
        $tdGroups = [
            [
                'name' => 'Groupe A',
                'school_session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Groupe B',
                'school_session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Groupe C',
                'school_session_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Groupe D',
                'school_session_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Groupe E',
                'school_session_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Groupe F',
                'school_session_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('td_groups')->insert($tdGroups);
    }
}

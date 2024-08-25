<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            ['name' => 'Développeur'],
            ['name' => 'Designer'],
            ['name' => 'Chef de projet'],
            ['name' => 'Analyste de données'],
            ['name' => 'Administrateur système'],
            ['name' => 'Professeur'],
        ];

        DB::table('professions')->insert($professions);
    }
}

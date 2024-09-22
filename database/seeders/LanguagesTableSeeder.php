<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'Anglais'],
            ['name' => 'Français'],
            ['name' => 'Espagnol'],
            ['name' => 'Arabe'],
            ['name' => 'Italien'],
            ['name' => 'Allemand'],
            ['name' => 'Autres'],
        ];
        DB::table('languages')->insert($languages);
    }
}

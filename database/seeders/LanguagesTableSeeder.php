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
            ['name' => 'English'],
            ['name' => 'French'],
            ['name' => 'Spanish'],
            ['name' => 'Arabe'],
            ['name' => 'Italian'],
        ];
        DB::table('languages')->insert($languages);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comites = [
            ['name' => 'Comité Dakar'],
            ['name' => 'Comité Guédiawaye'],
            ['name' => 'Comité Pikine'],
            ['name' => 'Comité Rufisque'],
            ['name' => 'Comité Keur Massar'],
            ['name' => 'Comité Mbour'],
            ['name' => 'Comité Thiès'],
            ['name' => 'Comité Tivaouane'],
            ['name' => 'Comité Saint Louis'],
            ['name' => 'Comité Louga'],
            ['name' => 'Comité Kaolack'],
        ];
        DB::table('comites')->insert($comites);
    }
}

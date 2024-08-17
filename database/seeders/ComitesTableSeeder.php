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
            ['name' => 'Comité Afrique'],
            ['name' => 'Comité Belgique'],
            ['name' => 'Comité Cameroun'],
            ['name' => 'Comité Dakar'],
            ['name' => 'Comité Anglend'],
            ['name' => 'Comité France'],
            ['name' => 'Comité Germany'],
            ['name' => 'Comité Helsinki'],
            ['name' => 'Comité Italie'],
            ['name' => 'Comité Japon'],
        ];
        DB::table('comites')->insert($comites);
    }
}

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
            ['name' => 'Enseignant - Professeur'],
            ['name' => 'Menuisier'],
            ['name' => 'Tailleur'],
            ['name' => 'Etudiant'],
            ['name' => 'Mécanicien'],
            ['name' => 'Commerçant'],
            ['name' => 'Cultivateur'],
            ['name' => 'Médecin - Infirmier'],
            ['name' => 'Plombier'],
            ['name' => 'Commerçant'],
            ['name' => 'Développeur'],
            ['name' => 'Designer'],
            ['name' => 'Infographie - Multimeéia'],
            ['name' => 'Informatique - Télécom'],
            ['name' => 'Juriste'],
            ['name' => 'Autres'],
        ];

        DB::table('professions')->insert($professions);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')
            ->pluck('id')
            ->toArray();

        $conseils = DB::table('conseils')->pluck('id')->toArray();

        if (count($users) > 0 && count($conseils) > 0) {
            $students = [];
            for ($i = 1; $i <= 10; $i++) {
                $students[] = [
                    'user_id' => $users[array_rand($users)],
                    'conseil_id' => $conseils[array_rand($conseils)],
                    'matricule' => 'MATRICULE-' . Str::upper(Str::random(5)),
                    'born_date' => now()->subYears(rand(10, 20)),
                    'specific_desease' => null,
                    'allergies' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('students')->insert($students);
        }
    }
}

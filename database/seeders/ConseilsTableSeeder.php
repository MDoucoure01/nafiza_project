<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConseilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comites = DB::table('comites')->pluck('id')->toArray();
        if (count($comites) > 0) {
            $conseils = [];
            for ($i = 1; $i <= 10; $i++) {
                $conseils[] = [
                    'name' => 'Conseil ' . $i,
                    'comite_id' => $comites[array_rand($comites)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('conseils')->insert($conseils);
        }
    }
}

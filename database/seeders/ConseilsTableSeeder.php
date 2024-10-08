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
            foreach ($comites as $comite) {
                for ($i = 1; $i <= 3; $i++) {
                    $conseils[] = [
                        'name' => 'Conseil ' . $i,
                        'comite_id' => $comite,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            DB::table('conseils')->insert($conseils);
        }
    }
}

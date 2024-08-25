<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->toArray();
        $professionIds = DB::table('professions')->pluck('id')->toArray();
        $userProfessions = [];
        foreach ($userIds as $userId) {
            $randomProfessions = array_rand(array_flip($professionIds), rand(1, count($professionIds)));
            foreach ((array) $randomProfessions as $professionId) {
                $userProfessions[] = [
                    'user_id' => $userId,
                    'profession_id' => $professionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('user_professions')->insert($userProfessions);
    }
}

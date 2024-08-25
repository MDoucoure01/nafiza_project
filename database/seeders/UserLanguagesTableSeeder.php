<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->toArray();
        $languageIds = DB::table('languages')->pluck('id')->toArray();
        $userLanguages = [];
        foreach ($userIds as $userId) {
            $randomLanguages = array_rand(array_flip($languageIds), rand(1, count($languageIds)));
            foreach ((array) $randomLanguages as $languageId) {
                $userLanguages[] = [
                    'user_id' => $userId,
                    'language_id' => $languageId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('user_languages')->insert($userLanguages);
    }
}

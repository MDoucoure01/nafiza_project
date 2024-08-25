<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer le Super Admin
        DB::table('users')->insert([
            'role_id' => 1, // Assuming 'Super Admin' has role_id = 1
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@example.com',
            'phone' => '0123456789',
            'address' => 'Admin Street, City',
            'password' => Hash::make('password123'), // Remplacez par un mot de passe fort
        ]);

        // Créer 3 Professeurs
        $professors = [
            ['firstname' => 'John', 'lastname' => 'Doe', 'email' => 'john.doe@example.com', 'phone' => '0123456780'],
            ['firstname' => 'Jane', 'lastname' => 'Smith', 'email' => 'jane.smith@example.com', 'phone' => '0123456781'],
            ['firstname' => 'Robert', 'lastname' => 'Brown', 'email' => 'robert.brown@example.com', 'phone' => '0123456782'],
        ];

        foreach ($professors as $professor) {
            DB::table('users')->insert([
                'role_id' => 5, // Assuming 'Professeur' has role_id = 5
                'firstname' => $professor['firstname'],
                'lastname' => $professor['lastname'],
                'email' => $professor['email'],
                'phone' => $professor['phone'],
                'address' => null,
                'password' => Hash::make('password123'), // Remplacez par un mot de passe fort
            ]);
        }

        // Créer 1 Secrétaire
        DB::table('users')->insert([
            'role_id' => 3, // Assuming 'Secretaire' has role_id = 3
            'firstname' => 'Alice',
            'lastname' => 'Johnson',
            'email' => 'alice.johnson@example.com',
            'phone' => '0123456783',
            'address' => null,
            'password' => Hash::make('password123'), // Remplacez par un mot de passe fort
        ]);

        // Créer 15 Pensionnaires
        for ($i = 1; $i <= 15; $i++) {
            DB::table('users')->insert([
                'role_id' => 4, // Assuming 'Pensionnaire' has role_id = 4
                'firstname' => 'Pensionnaire',
                'lastname' => 'User ' . $i,
                'email' => 'pensionnaire' . $i . '@example.com',
                'phone' => '01234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => null,
                'password' => Hash::make('password123'), // Remplacez par un mot de passe fort
            ]);
        }
    }
}

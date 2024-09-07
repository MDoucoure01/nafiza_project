<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer le Super Admin
        DB::table('users')->insert([ 
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
            $userId = DB::table('users')->insertGetId([
                'firstname' => $professor['firstname'],
                'lastname' => $professor['lastname'],
                'email' => $professor['email'],
                'phone' => $professor['phone'],
                'address' => null,
                'password' => Hash::make('password123'), // Remplacez par un mot de passe fort
            ]);

            // Récupérer l'utilisateur inséré
            $userProf = User::find($userId);

            // Assigner le rôle
            $userProf->assignRole('professor');
        }

        // Créer 15 Pensionnaires
        for ($i = 1; $i <= 15; $i++) {
            $userId = DB::table('users')->insertGetId([
                'firstname' => 'Pensionnaire',
                'lastname' => 'User ' . $i,
                'email' => 'pensionnaire' . $i . '@example.com',
                'phone' => '01234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => null,
                'password' => Hash::make('password123'), // Remplacez par un mot de passe fort
            ]);

            // Récupérer l'utilisateur inséré
            $userStudent = User::find($userId);

            // Assigner le rôle
            $userStudent->assignRole('student');

        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rôles assignés au guard web pour le backoffice
        $webRoles = ['root', 'admin', 'secretary'];

        // Rôles assignés au guard api pour le frontend
        $apiRoles = ['professor', 'student'];

        // Création des rôles pour le guard web
        foreach ($webRoles as $roleName) {
            $role = Role::create([
                'name' => $roleName,
                'guard_name' => 'api',
            ]);

            // Création d'un utilisateur pour chaque rôle (pour le guard web)
            $user = User::create([
                'firstname' => ucfirst($roleName) . ' User',
                'email' => $roleName . '@nafiza.com',
                'password' => Hash::make('password'), // Assurez-vous de changer le mot de passe
            ]);

            // Assigner le rôle à l'utilisateur pour le guard web
            $user->assignRole($role);
        }

        // Création des rôles pour le guard api
        foreach ($apiRoles as $roleName) {
            Role::create([
                'name' => $roleName,
                'guard_name' => 'api',
            ]);

            // Si besoin, on peut aussi créer des utilisateurs ici pour l'API, ou gérer l'authentification différemment
        }
    }
}

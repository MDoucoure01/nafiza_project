<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        // $this->call(RolesTableSeeder::class);
        $this->call(ComitesTableSeeder::class);
        $this->call(ConseilsTableSeeder::class);
        $this->call(SchoolSessionsTableSeeder::class);
        $this->call(CohortsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SubscriptionsTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(CourseTypeSeeder::class);
    }
}

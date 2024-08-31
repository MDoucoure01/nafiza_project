<?php

namespace Database\Seeders;

use App\Models\School_session;
use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $schoolSessionIds = School_session::pluck('id')->toArray();
        $subscriptions = [];

        foreach ($students as $student) {
            Subscription::create([
                'student_id' => $student->id,
                'school_session_id' => 1,
                'is_active' => rand(0, 1),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace App\Observers;

use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class StudentObserve
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        $anneeActifId = 1;
        $subscription = Subscription::create([
         'session_id'=> $anneeActifId,
         'student_id'=> $student->id
        ]);
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}

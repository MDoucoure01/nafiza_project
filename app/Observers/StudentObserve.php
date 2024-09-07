<?php

namespace App\Observers;

use App\Models\School_session;
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
        $anneeActifId = request()->appActuSession->id;
        // Vérifiez si les frais ont été payés
        $isActive = isset($student->fee_paid) && $student->fee_paid == 1;

        $subscription = Subscription::create([
         'school_session_id'=> $anneeActifId,
         'student_id'=> $student->id,
         'is_active' => $isActive, // 1 si payé, 0 sinon
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
        // Vérifie si c'est un soft delete
        if ($student->isForceDeleting()) {
            // Si c'est une suppression définitive, on supprime aussi les relations de manière définitive
            $student->subscriptions()->forceDelete();
            $student->user()->forceDelete();
        } else {
            // Si c'est un soft delete, on soft delete aussi les relations
            $student->subscriptions()->delete();
            $student->user()->delete();
        }
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        // Lorsque l'étudiant est restauré, on restaure aussi ses relations
        $student->subscriptions()->withTrashed()->restore();
        $student->user()->withTrashed()->restore();
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}

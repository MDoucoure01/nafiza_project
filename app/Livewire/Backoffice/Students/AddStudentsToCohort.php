<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Cohort;
use App\Models\Session_Cohort;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddStudentsToCohort extends Component
{
    public $students;
    public $cohort;
    public $selectedStudents = [];

    public function mount(){
        // $this->students = request()->appActuSession->students;
        $sessionId = request()->appActuSession->id;
        $this->students = Student::whereHas('schoolsessions', function($query) use ($sessionId) {
            $query->where('school_session_id', $sessionId)
                  ->where('is_active', 1);
        })
        ->whereDoesntHave('subscriptions.cohorts', function($query) {
            $query->where('is_actual', 1); // Si tu utilises un champ pour identifier la cohorte actuelle
        })->get();

        $this->cohort = Cohort::where('slug', request()->slug)->first();
    }

    public function attachSelectedStudents()
    {
        // Récupérer l'ID de session_cohorts correspondant à la cohorte et à la session actuelle
        $sessionCohort = Session_Cohort::where('cohort_id', $this->cohort->id)
            ->where('school_session_id', request()->appActuSession->id)
            ->first();

        if (!$sessionCohort) {
            toastr()->error('La cohorte ou session est invalide.');
            return;
        }

        foreach ($this->selectedStudents as $studentId) {
            // Récupérer l'inscription active de chaque étudiant
            $student = Student::find($studentId);
            $activeSubscription = $student->activeSubscription();

            if ($activeSubscription) {
                // Vérifier si l'étudiant est déjà dans cette session/cohorte
                $existingCohort = DB::table('cohort_subscriptions')
                    ->where('subscription_id', $activeSubscription->id)
                    ->where('session_cohort_id', $sessionCohort->id)
                    ->first();

                if (!$existingCohort) {
                    // Ajouter la relation dans cohort_subscriptions en utilisant session_cohort_id
                    DB::table('cohort_subscriptions')->insert([
                        'subscription_id' => $activeSubscription->id,
                        'session_cohort_id' => $sessionCohort->id,
                        'is_actual' => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }

        // Optionnel : ajouter un message de succès
        toastr()->success('Pensionnaires ajoutés dans la cohorte de la session avec succès !');
        return redirect()->route('cohort.show', ['slug' => $this->cohort->slug]);
    }


    public function render()
    {
        return view('livewire.backoffice.students.add-students-to-cohort')->layout('layouts.app');
    }
}

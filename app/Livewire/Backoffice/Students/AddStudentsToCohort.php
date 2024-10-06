<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Cohort;
use App\Models\Student;
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

    public function attachSelectedStudents(){

        foreach ($this->selectedStudents as $studentId) {
            // Récupérer l'inscription active de chaque étudiant
            $student = Student::find($studentId);
            $activeSubscription = $student->activeSubscription();

            if ($activeSubscription) {
                // Vérifier si l'étudiant est déjà dans cette cohorte
                $existingCohort = $this->cohort->subscriptions()
                    ->wherePivot('subscription_id', $activeSubscription->id)
                    ->first();

                if (!$existingCohort) {
                    // Ajouter la relation dans cohort_subscriptions
                    $this->cohort->subscriptions()->attach($activeSubscription->id, ['is_actual' => 1]);
                }
            }
        }

        // Optionnel : ajouter un message de succès
        toastr()->success('Pensionnaires ajoutés dans '.$this->cohort->name.' avec succès !');
        return redirect()->route('cohort.show', ['slug' => $this->cohort->slug ]);
    }

    public function render()
    {
        return view('livewire.backoffice.students.add-students-to-cohort')->layout('layouts.app');
    }
}

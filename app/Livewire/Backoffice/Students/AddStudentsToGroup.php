<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Student;
use App\Models\TdGroup;
use Livewire\Component;

class AddStudentsToGroup extends Component
{
    public $students;
    public $group;
    public $selectedStudents = [];

    public function mount(){
        $this->group = TdGroup::where('slug', request()->slug)->first();

        $sessionId = request()->appActuSession->id;
        $cohortId = $this->group->cohort_id; // Cohorte du groupe

        $this->students = Student::whereHas('schoolsessions', function($query) use ($sessionId) {
            $query->where('school_session_id', $sessionId)
                ->where('is_active', 1);
        })
        ->with(['subscriptions' => function($query) use ($cohortId) {
            $query->whereHas('cohort', function($query) use ($cohortId) {
                $query->where('cohort_id', $cohortId); // Cohorte spécifique
            });
        }])
        ->whereDoesntHave('subscriptions.groups', function($query) {
            $query->where('is_actual', 1); // Vérifie que l'étudiant n'a pas de groupe actuel
        })
        ->get();

    }

    public function attachSelectedStudents(){

        foreach ($this->selectedStudents as $studentId) {
            // Récupérer l'inscription active de chaque étudiant
            $student = Student::find($studentId);
            $activeSubscription = $student->activeSubscription();

            if ($activeSubscription) {
                // Vérifier si l'étudiant est déjà dans ce groupe
                $existingGroup = $this->group->subscriptions()
                    ->wherePivot('subscription_id', $activeSubscription->id)
                    ->first();

                if (!$existingGroup) {
                    // Ajouter la relation dans student_tdgroups
                    $this->group->subscriptions()->attach($activeSubscription->id, ['is_actual' => 1]);
                }
            }
        }

        // Optionnel : ajouter un message de succès
        toastr()->success('Pensionnaires ajoutés dans '.$this->group->name.' avec succès !');
        return redirect()->route('group.show', ['slug' => $this->group->slug ]);
    }

    public function render()
    {
        return view('livewire.backoffice.students.add-students-to-group')->layout('layouts.app');
    }
}

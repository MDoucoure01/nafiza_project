<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Student;
use App\Models\Subscription;
use Livewire\Component;

class ListStudent extends Component
{
    public $students;

    public function mount(){
        // $this->students = request()->appActuSession->students;
        $sessionId = request()->appActuSession->id;
        $this->students = Student::whereHas('schoolsessions', function($query) use ($sessionId) {
            $query->where('school_session_id', $sessionId)
                  ->where('is_active', 1);
        })->get();
    }

    public function removeStudent($studentId)
    {
        // Supprimer la relation de la table pivot
        Student::findOrFail($studentId)->delete();

        session()->flash('message', 'Vous venez de supprimer ce pensionnaire.');

        toastr()->error('Pensionnaire supprimé avec succès !');
        return redirect()->route('students.list')->with('student_id', $studentId);
        // return redirect()->back();
    }

    public function disableStudent($studentId)
    {
        // Supprimer la relation de la table pivot
        $subscription = Subscription::where('student_id', $studentId)->where('school_session_id', request()->appActuSession->id)->first();
        $subscription->is_active = 0;
        $subscription->save();

        session()->flash('disable_msg', 'Vous venez de désactiver ce pensionnaire.');

        toastr()->error('Pensionnaire désactivé avec succès !');
        return redirect()->route('students.list')->with('student_id', $studentId);
        // return redirect()->back();
    }

    public function restoreStudent($studentId)
    {
        // Récupère l'étudiant supprimé (soft deleted) par son ID
        $student = Student::withTrashed()->findOrFail($studentId);

        // Restaure l'étudiant
        $student->restore();

        toastr()->success('Pensionnaire restauré avec succès !');
        return redirect()->route('students.list');
    }

    public function render()
    {
        return view('livewire.backoffice.students.list-student')->layout('layouts.app');
    }
}

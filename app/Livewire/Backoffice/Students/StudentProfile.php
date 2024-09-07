<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Comite;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Student;
use App\Models\Subscription;
use Livewire\Component;

class StudentProfile extends Component
{
    public $student;
    public $currentCohort;
    public $comites;
    public $professions;
    public $languages;
    public $subscription;

    public function mount(){
        $this->comites = Comite::orderBy('name', 'asc')->get();
        $this->professions = Profession::orderBy('name', 'asc')->get();
        $this->languages = Language::orderBy('name', 'asc')->get();
        $this->student = Student::findOrFail(request()->id);
        $this->subscription = Subscription::where('student_id', request()->id)
                                            ->where('school_session_id', request()->appActuSession->id)
                                            ->first();
        $this->currentCohort = "A";
    }

    public function render()
    {
        return view('livewire.backoffice.students.student-profile')->layout('layouts.app');
    }
}

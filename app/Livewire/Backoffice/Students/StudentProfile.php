<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Student;
use Livewire\Component;

class StudentProfile extends Component
{
    public $student;
    public $currentCohort;

    public function mount(){
        $this->student = Student::findOrFail(request()->id);
        $this->currentCohort = "A";
    }

    public function render()
    {
        return view('livewire.backoffice.students.student-profile')->layout('layouts.app');
    }
}

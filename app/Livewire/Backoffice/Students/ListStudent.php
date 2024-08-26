<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Student;
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

    public function render()
    {
        return view('livewire.backoffice.students.list-student')->layout('layouts.app');
    }
}

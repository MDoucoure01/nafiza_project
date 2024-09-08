<?php

namespace App\Livewire\Backoffice\Professors;

use App\Models\Professor;
use Livewire\Component;

class ListProfessors extends Component
{
    public $professors;

    public function mount(){
        $sessionId = request()->appActuSession->id;
        $this->professors = Professor::whereHas('schoolsessions', function($query) use ($sessionId) {
            $query->where('school_session_id', $sessionId);
        })->get();
    }

    public function render()
    {
        return view('livewire.backoffice.professors.list-professors')->layout('layouts.app');
    }
}

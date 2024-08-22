<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\School_session;
use Livewire\Component;

class ListSessions extends Component
{
    public $schoolSessions;

    public function mount(){
        $this->schoolSessions = School_session::orderByDesc('id')->get();
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.list-sessions')->layout('layouts.app');
    }
}

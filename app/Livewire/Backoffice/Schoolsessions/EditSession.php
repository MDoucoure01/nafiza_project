<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\School_session;
use Livewire\Component;

class EditSession extends Component
{
    public $schoolSessions;
    public $session;

    public function mount(){
        $this->schoolSessions = School_session::orderByDesc('id')->get();
        $this->session = School_session::findOrFail(request()->id);
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.edit-session')->layout('layouts.app');
    }
}

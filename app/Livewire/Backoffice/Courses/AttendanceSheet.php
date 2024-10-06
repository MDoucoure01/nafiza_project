<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Seance;
use Livewire\Component;

class AttendanceSheet extends Component
{
    public $seance;

    public function mount()
    {
        $this->seance = Seance::findOrFail(request()->id);
    }

    public function render()
    {
        return view('livewire.backoffice.courses.attendance-sheet')->layout('layouts.app');
    }
}

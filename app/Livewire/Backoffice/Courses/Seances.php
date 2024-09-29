<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Seance;
use Livewire\Component;

class Seances extends Component
{
    public $seances;

    public function mount()
    {
        $this->seances = Seance::all();
    }

    public function render()
    {
        return view(view: 'livewire.backoffice.courses.seances')->layout('layouts.app');
    }
}

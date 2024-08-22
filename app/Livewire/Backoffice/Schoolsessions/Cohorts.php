<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use Livewire\Component;

class Cohorts extends Component
{
    public function render()
    {
        return view('livewire.backoffice.schoolsessions.cohorts')->layout('layouts.app');
    }
}

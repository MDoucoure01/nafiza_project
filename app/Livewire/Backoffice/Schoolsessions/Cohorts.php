<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\Cohort;
use Livewire\Component;

class Cohorts extends Component
{
    public $cohorts;

    public function mount(){
        $this->cohorts = Cohort::all();
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.cohorts')->layout('layouts.app');
    }
}

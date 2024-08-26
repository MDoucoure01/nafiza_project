<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\Cohort;
use Livewire\Component;

class EditCohort extends Component
{
    public $cohorts;
    public $cohort;

    public function mount(){
        $this->cohorts = Cohort::all();
        $this->cohort = Cohort::findOrFail(request()->id);
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.edit-cohort')->layout('layouts.app');
    }
}

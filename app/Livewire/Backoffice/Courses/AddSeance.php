<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Cohort;
use App\Models\Course;
use App\Models\Professor;
use Livewire\Component;

class AddSeance extends Component
{
    public $professors;
    public $courses;
    public $cohorts;

    public function mount()
    {
        $this->professors = Professor::all();
        $this->courses = Course::all();
        $this->cohorts = Cohort::all();
    }

    public function render(): mixed
    {
        return view(view: 'livewire.backoffice.courses.add-seance')->layout('layouts.app');
    }
}

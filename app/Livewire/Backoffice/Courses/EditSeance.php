<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Cohort;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Seance;
use Livewire\Component;

class EditSeance extends Component
{
    public $professors;
    public $courses;
    public $cohorts;
    public $seance;

    public function mount()
    {
        $this->seance = Seance::findOrFail(request()->id);
        $this->professors = Professor::whereNot('id', $this->seance->professor_id)->get();
        $this->courses = Course::whereNot('id', $this->seance->course_id)->get();
        $this->cohorts = Cohort::whereNot('id', $this->seance->cohort_id)->get();
    }

    public function render()
    {
        return view('livewire.backoffice.courses.edit-seance')->layout('layouts.app');
    }
}

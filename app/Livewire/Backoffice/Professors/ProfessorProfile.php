<?php

namespace App\Livewire\Backoffice\Professors;

use App\Models\Language;
use App\Models\Profession;
use App\Models\Professor;
use Livewire\Component;

class ProfessorProfile extends Component
{
    public $professions;
    public $professor;
    public $languages;
    public $subscription;

    public function mount(){
        $this->professions = Profession::orderBy('name', 'asc')->get();
        $this->languages = Language::orderBy('name', 'asc')->get();
        $this->professor = Professor::findOrFail(request()->id);
    }

    public function render()
    {
        return view('livewire.backoffice.professors.professor-profile')->layout('layouts.app');
    }
}

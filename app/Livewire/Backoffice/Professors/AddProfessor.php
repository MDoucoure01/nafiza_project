<?php

namespace App\Livewire\Backoffice\Professors;

use App\Models\Language;
use App\Models\Profession;
use Livewire\Component;

class AddProfessor extends Component
{
    public $professions;
    public $languages;

    public function mount(){
        $this->professions = Profession::orderBy('name', 'asc')->get();
        $this->languages = Language::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.backoffice.professors.add-professor')->layout('layouts.app');
    }
}

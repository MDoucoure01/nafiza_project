<?php

namespace App\Livewire\Backoffice\Students;

use App\Models\Comite;
use App\Models\Language;
use App\Models\Profession;
use Livewire\Component;

class AddStudent extends Component
{
    public $comites;
    public $professions;
    public $languages;

    public function mount(){
        $this->comites = Comite::orderBy('name', 'asc')->get();
        $this->professions = Profession::orderBy('name', 'asc')->get();
        $this->languages = Language::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.backoffice.students.add-student')->layout('layouts.app');
    }
}

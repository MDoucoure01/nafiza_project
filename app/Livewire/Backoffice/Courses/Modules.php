<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Module;
use Livewire\Component;

class Modules extends Component
{
    public $modules;

    public function mount(){
        $this->modules = Module::all();
    }

    public function render()
    {
        return view('livewire.backoffice.courses.modules')->layout('layouts.app');
    }
}

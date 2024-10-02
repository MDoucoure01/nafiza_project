<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Module;
use Livewire\Component;

class ShowModule extends Component
{
    public $module;
    public $otherModules;

    public function mount(){
        $this->module = Module::findOrFail(request()->id);
        $this->otherModules = request()->appActuSession->modules->where('id', '!=', $this->module->id);
    }

    public function render()
    {
        return view('livewire.backoffice.courses.show-module')->layout('layouts.app');
    }
}

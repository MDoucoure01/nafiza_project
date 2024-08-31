<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\TdGroup;
use Livewire\Component;

class EditGroup extends Component
{
    public $groupsTD;
    public $group;

    public function mount(){
        $this->groupsTD = TdGroup::orderByDesc('id')->get();
        $this->group = TdGroup::findOrFail(request()->id);
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.edit-group')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\TdGroup;
use Livewire\Component;

class ShowGroup extends Component
{
    public $group;
    public $otherGroups;

    public function mount(){
        $this->group = TdGroup::where('slug', request()->slug)->first();
        $this->otherGroups = request()->appActuSession->groups->where('id', '!=', $this->group->id);
    }


    public function render()
    {
        return view('livewire.backoffice.schoolsessions.show-group')->layout('layouts.app');
    }
}

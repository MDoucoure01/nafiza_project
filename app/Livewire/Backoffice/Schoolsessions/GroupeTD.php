<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\TdGroup;
use Livewire\Component;

class GroupeTD extends Component
{
    public $groupsTD;

    public function mount(){
        $this->groupsTD = TdGroup::orderByDesc('id')->get();
    }


    public function render()
    {
        return view('livewire.backoffice.schoolsessions.groupe-t-d')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Backoffice\Students;

use Livewire\Component;

class ListStudent extends Component
{
    public function render()
    {
        return view('livewire.backoffice.students.list-student')->layout('layouts.app');
    }
}

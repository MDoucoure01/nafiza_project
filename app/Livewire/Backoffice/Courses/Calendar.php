<?php

namespace App\Livewire\Backoffice\Courses;

use Livewire\Component;

class Calendar extends Component
{
    public function render()
    {
        return view('livewire.backoffice.courses.calendar')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Backoffice\Courses;

use Livewire\Component;

class AddCourse extends Component
{
    public function render()
    {
        return view('livewire.backoffice.courses.add-course')->layout('layouts.app');
    }
}

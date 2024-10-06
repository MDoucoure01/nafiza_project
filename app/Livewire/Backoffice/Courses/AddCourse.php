<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\CourseType;
use App\Models\Module;
use Livewire\Component;

class AddCourse extends Component
{
    public $courseTypes;
    public $modules;

    public function mount(): void{
        $this->courseTypes = CourseType::all();
        $this->modules = Module::all();
    }

    public function render(): mixed
    {
        return view('livewire.backoffice.courses.add-course')->layout('layouts.app');
    }
}

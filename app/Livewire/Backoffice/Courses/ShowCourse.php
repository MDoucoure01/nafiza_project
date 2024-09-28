<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Course;
use Livewire\Component;

class ShowCourse extends Component
{
    public $course;

    public function mount(): void
    {
        $this->course = Course::find(request()->id);
    }

    public function render(): mixed
    {
        return view('livewire.backoffice.courses.show-course')->layout('layouts.app');
    }
}

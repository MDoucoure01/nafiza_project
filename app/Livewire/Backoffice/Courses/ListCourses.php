<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Course;
use Livewire\Component;

class ListCourses extends Component
{
    public $courses;

    public function mount(): void
    {
        $this->courses = Course::all();
    }

    public function render(): mixed
    {
        return view(view: 'livewire.backoffice.courses.list-courses')->layout('layouts.app');
    }
}

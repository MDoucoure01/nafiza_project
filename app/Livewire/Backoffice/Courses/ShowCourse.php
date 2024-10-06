<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\Module;
use Livewire\Component;

class ShowCourse extends Component
{
    public $course;
    public $courseTypes;
    public $modules;

    public function mount(): void
    {
        $this->course = Course::find(request()->id);
        $this->courseTypes = CourseType::where('id', '!=', $this->course->course_type_id)->get();
        $this->modules = Module::where('id', '!=', $this->course->module_id)->get();
    }

    public function render(): mixed
    {
        return view('livewire.backoffice.courses.show-course')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Backoffice\Courses;

use App\Models\Seance;
use Livewire\Component;

class Calendar extends Component
{
    public $appointments;
    public $events = [];

    public function mount()
    {
        $this->appointments = Seance::with(['professor', 'course', 'cohort'])->get();

        foreach ($this->appointments as $appointment) {
            $this->events[] = [
                'title' => $appointment->course->title. ' - ' .$appointment->cohort->name,
                'start' => $appointment->date.' '.$appointment->start_time,
                'end' => $appointment->date.' '.$appointment->end_time,
            ];
        }
    }

    public function render()
    {
        return view('livewire.backoffice.courses.calendar')->layout('layouts.app');
    }
}

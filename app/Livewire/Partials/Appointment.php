<?php

namespace App\Livewire\Partials;

use App\Models\Seance;
use Livewire\Component;

class Appointment extends Component
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
                'url' => route(name: 'seance.show', parameters: ['id' => $appointment->id]), // Lien vers les détails de la séance
            ];
        }
    }
    public function render()
    {
        return view('livewire.partials.appointment');
    }
}

<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\Cohort;
use App\Models\School_session;
use Livewire\Component;

class ShowSession extends Component
{
    public $schoolSessions;
    public $session;
    public $allCohorts;

    public function mount(){
        $this->allCohorts = Cohort::get();
        $this->session = School_session::where('slug', request()->slug)->first();
        $this->schoolSessions = School_session::where('id', '!=', $this->session->id)
                                                ->orderByDesc('id')->get();
    }

    public function removeCohort($cohortId)
    {
        // Supprimer la relation de la table pivot
        $this->session->cohorts()->detach($cohortId);

        // Envoyer un message de confirmation (facultatif)
        toastr()->error('Cohorte enlevée avec succès !');
        return redirect()->route('session.show', ['slug' => $this->session->slug ]);
        // return redirect()->back();
    }


    public function render()
    {
        return view('livewire.backoffice.schoolsessions.show-session')->layout('layouts.app');
    }
}

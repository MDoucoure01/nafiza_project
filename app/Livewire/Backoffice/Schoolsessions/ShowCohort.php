<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\Cohort;
use Livewire\Component;

class ShowCohort extends Component
{
    public $cohort;
    public $otherCohorts;

    public function mount(){
        $this->cohort = Cohort::where('slug', request()->slug)->first();
        $this->otherCohorts = request()->appActuSession->cohorts->where('id', '!=', $this->cohort->id);
    }

    public function removeGroup($groupId)
    {
        // Supprimer la relation de la table pivot
        $this->cohort->groups()->detach($groupId);

        // Envoyer un message de confirmation (facultatif)
        toastr()->error('Groupe supprimé avec succès !');
        return redirect()->route('cohort.show', ['slug' => $this->cohort->slug ]);
        // return redirect()->back();
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.show-cohort')->layout('layouts.app');
    }
}

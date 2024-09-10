<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\Cohort;
use App\Models\TdGroup;
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
        TdGroup::findOrFail($groupId)->delete();

        // Envoyer un message de confirmation (facultatif)
        toastr()->error('Groupe supprimé avec succès !');
        return redirect()->route('cohort.show', ['slug' => $this->cohort->slug ]);
        // return redirect()->back();
    }

    public function detachStudent($studentId)
    {
        // Détacher l'étudiant de la cohorte
        $this->cohort->subscriptions()->detach($studentId);

        // Optionnel : ajouter un message de succès
        toastr()->error('Pensionnaire enlevé de la cohorte avec succès !');
        return redirect()->route('cohort.show', ['slug' => $this->cohort->slug ]);
    }

    public function render()
    {
        return view('livewire.backoffice.schoolsessions.show-cohort')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\TdGroup;
use Livewire\Component;

class GroupeTD extends Component
{
    public $groupsTD;

    public function mount(){
        $this->groupsTD = TdGroup::orderByDesc('id')->get();
    }

    public function removeGroup($groupId)
    {
        // Supprimer la relation de la table pivot
        TdGroup::findOrFail($groupId)->delete();

        // Envoyer un message de confirmation (facultatif)
        toastr()->error('Groupe supprimé avec succès !');
        return redirect()->route('groupes.td');
        // return redirect()->back();
    }


    public function render()
    {
        return view('livewire.backoffice.schoolsessions.groupe-t-d')->layout('layouts.app');
    }
}

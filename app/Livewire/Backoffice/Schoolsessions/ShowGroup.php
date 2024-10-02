<?php

namespace App\Livewire\Backoffice\Schoolsessions;

use App\Models\TdGroup;
use Livewire\Component;

class ShowGroup extends Component
{
    public $group;
    public $otherGroups;

    public function mount(){
        $this->group = TdGroup::where('slug', request()->slug)->first();
        $this->otherGroups = request()->appActuSession->groups->where('id', '!=', $this->group->id);
    }

    public function detachStudent($studentId)
    {
        // Détacher l'étudiant de la cohorte
        $this->group->subscriptions()->detach($studentId);

        // Optionnel : ajouter un message de succès
        toastr()->error('Pensionnaire enlevé du groupe avec succès !');
        return redirect()->route('group.show', ['slug' => $this->group->slug ]);
    }


    public function render()
    {
        return view('livewire.backoffice.schoolsessions.show-group')->layout('layouts.app');
    }
}

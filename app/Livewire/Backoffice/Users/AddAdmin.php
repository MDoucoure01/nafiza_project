<?php

namespace App\Livewire\Backoffice\Users;

use Livewire\Component;

class AddAdmin extends Component
{
    public function render()
    {
        return view('livewire.backoffice.users.add-admin')->layout('layouts.app');
    }
}

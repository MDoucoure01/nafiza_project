<?php

namespace App\Livewire\Backoffice;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.backoffice.home-component')->layout('layouts.app');
    }
}

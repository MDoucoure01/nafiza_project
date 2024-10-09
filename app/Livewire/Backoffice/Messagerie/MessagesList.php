<?php

namespace App\Livewire\Backoffice\Messagerie;

use Livewire\Component;

class MessagesList extends Component
{
    public function render()
    {
        return view('livewire.backoffice.messagerie.messages-list')->layout('layouts.app');
    }
}

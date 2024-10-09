<?php

namespace App\Livewire\Backoffice\Messagerie;

use Livewire\Component;

class SendMessageForm extends Component
{
    public function render()
    {
        return view('livewire.backoffice.messagerie.send-message-form')->layout('layouts.app');
    }
}

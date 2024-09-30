<?php

namespace App\Livewire\Backoffice\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListAdmin extends Component
{
    public $admins;

    public function mount()
    {
        $this->admins = User::role(['admin', 'secretary'])->whereNot('id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.backoffice.users.list-admin')->layout('layouts.app');
    }
}

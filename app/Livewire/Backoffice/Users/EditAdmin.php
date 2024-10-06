<?php

namespace App\Livewire\Backoffice\Users;

use App\Models\User;
use Livewire\Component;

class EditAdmin extends Component
{
    public $admin;
    public $role;

    public function mount()
    {
        $this->admin = User::findOrFail(request()->id);
        $this->role = $this->admin->roles->first();
    }

    public function render()
    {
        return view('livewire.backoffice.users.edit-admin')->layout('layouts.app');
    }
}

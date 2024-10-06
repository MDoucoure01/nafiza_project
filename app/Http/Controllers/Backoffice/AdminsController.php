<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UserTrait;

class AdminsController extends Controller
{
    use UserTrait;

    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:150',
            'phone' => 'nullable|string|unique:users,phone|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $admin = $this->createUser($request);
        $admin->assignRole($request->role);

        toastr()->success('Admin créé avec succès !');
        return back();
    }

    public function update(Request $request)
    {
        $admin = $this->updateUser($request);

        toastr()->success('Admin modifié avec succès !');
        return back();
    }

    public function delete(Request $request)
    {
        $admin = $this->deleteUser($request);

        toastr()->error('Admin supprimé avec succès !');
        return back();
    }
}

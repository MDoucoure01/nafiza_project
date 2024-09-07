<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait UserTrait
{
    public function createUser($request)
    {
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone ?? null;
        $user->address = $request->address;
        $user->sex = $request->sex;
        $user->profile_photo_path = $request->profile_photo;
        $user->status = $request->status ?? null;
        $user->specific_skills = $request->specific_skills ?? null;
        $user->password = Hash::make("nafiza2024");
        $user->save();

        return $user;
    }

    public function updateUser($request)
    {
        $user = User::findOrFail($request->id);

        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'sex' => 'required',
            'address' => 'nullable|string|max:500',
            // 'phone' => 'required|string|unique:users,phone,' . $user->id,
            // 'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone ?? null;
        $user->address = $request->address;
        $user->sex = $request->sex;
        $user->profile_photo_path = $request->profile_photo;
        $user->status = $request->status ?? null;
        $user->specific_skills = $request->specific_skills ?? null;
        $user->save();

        return $user;
    }
}

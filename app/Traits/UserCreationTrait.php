<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait UserCreationTrait
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
}

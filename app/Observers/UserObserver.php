<?php

namespace App\Observers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        dd($user);
        // $data = session()->get('extra_data');

        // Student::create([
        //     'user_id' => $user->id,
        //     'conseil_id' => $data['conseil_id'],
        //     'matricule' => Str::random(10),
        //     'born_date' => $data['date_born'],
        //     'specific_desease' => $data['specific_desease'] ?? null,
        //     'allergies' => $data['allergies'] ?? null,
        // ]);

        // Effacer les données de la session après utilisation
        // session()->forget('extra_data');
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}

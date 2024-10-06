<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\SessionProfessor;
use Illuminate\Http\Request;
use App\Traits\UserTrait;

class ProfessorsController extends Controller
{
    use UserTrait;

    public function create(Request $request)
    {
        // dd($request->appActuSession->id);
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:150',
            'sex' => 'required',
            'phone' => 'nullable|string|unique:users,phone|max:20',
            'address' => 'nullable|string|max:500',
            'specific_skills' => 'nullable|string|max:500',
        ]);

        $user = $this->createUser($request);

        $user->assignRole('professor');

        if ($user) {
            $professor = new Professor();
            $professor->user_id = $user->id;
            $professor->experience_year  = $request->experience_year ;
            $professor->obtained_diplomas = $request->obtained_diplomas;
            $professor->hire_date = $request->hire_date;
            $professor->save();

            if($professor){
                $sessionProfessor = new SessionProfessor();
                $sessionProfessor->professor_id = $professor->id;
                $sessionProfessor->school_session_id = $request->appActuSession->id;
                $sessionProfessor->save();
            }
        }

        toastr()->success('Professeur créé avec succès !');
        return back();
    }
}

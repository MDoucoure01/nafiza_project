<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Traits\UserCreationTrait;
use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    use UserCreationTrait;

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
            'experience_year' => 'nullable|integer',
            'obtained_diplomas' => 'nullable|string|max:225',
            'hire_date' => 'nullable|date',
        ]);

        $user = $this->createUser($request);

        $user->assignRole('student');

        if ($user) {
            $student = new Student();
            $student->user_id = $user->id;
            $student->conseil_id = $request->conseil_id;
            $student->matricule = 'FCD'.rand(0, 9999).'24';
            $student->born_date = $request->born_date;
            $student->specific_desease = $request->specific_desease;
            $student->allergies = $request->allergies;
            $student->online = $request->online;
            $student->save();

            if($student){
                $subscription = new Subscription();
                $subscription->student_id = $student->id;
                $subscription->school_session_id = $request->appActuSession->id;
                if($request->fee_paid == 1){
                    $subscription->is_active = 1;
                }
                $subscription->save();
            }
        }

        toastr()->success('Pensionnaire créé avec succès !');
        return back();
    }
}

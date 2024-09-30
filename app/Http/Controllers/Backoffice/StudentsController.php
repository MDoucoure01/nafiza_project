<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Traits\QrTrait;
use App\Traits\UserTrait;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    use UserTrait;
    use QrTrait;

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
                // Passer la valeur de fee_paid à l'Observer
                $student->fee_paid = $request->fee_paid;

                $studentQR = $this->createQR($request, $student);
            }
        }

        toastr()->success('Pensionnaire créé avec succès !');
        return back();
    }

    public function update(Request $request)
    {
        $user = $this->updateUser($request);

        if ($user) {
            $student = Student::findOrFail($request->id);
            $student->conseil_id = $request->conseil_id;
            $student->born_date = $request->born_date;
            $student->specific_desease = $request->specific_desease;
            $student->allergies = $request->allergies;
            $student->online = $request->online;
            $student->save();

            if($student){
                $subscription = Subscription::where('student_id', request()->id)
                                                    ->where('school_session_id', request()->appActuSession->id)
                                                    ->first();
                $subscription->is_active = $request->fee_paid;
            }
        }

        toastr()->success('Pensionnaire créé avec succès !');
        return back();
    }
}

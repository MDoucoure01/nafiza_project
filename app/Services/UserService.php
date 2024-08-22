<?php

namespace App\Services;

use App\Http\Resources\Students\StudentResource;
use App\Models\Student;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserService
{
    use ResponseTrait;


    public $user;
    public function   __construct(int $userId)
    {
        /* @var User $user */
        $this->user = User::find($userId);
    }


    public function InsertUserStudent(object $request){
        $userExist = $this->user;

        try {
            return DB::transaction( function () use ($userExist, $request){

                if (!$userExist) {
                    return $this->responseData("Oops utilisateur n'existe pas", false, Response::HTTP_NOT_FOUND, null);
                }

                $student = Student::create([
                    "user_id" => $userExist->id,
                    "conseil_id" => $request->conseil_id,
                    "matricule" => 12345,
                    "born_date" => $request->date_born,
                    "specific_desease" => $request->specific_desease,
                    "allergies" => $request->allergies
                ]);



                if ($student) {
                   return true;
                }

                return false;

            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}

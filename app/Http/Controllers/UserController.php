<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserRequest;
use App\Http\Resources\Users\UserResource;
use App\Models\Conseil;
use App\Models\User;
use App\Services\ExistUser;
use App\Services\UserService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData("Tous les Utilisateurs", true, Response::HTTP_OK, UserResource::collection(User::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                // $roleExiste = Role::find($request->role_id);
                // if (!$roleExiste) {
                //     return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                // }
                $conseilExiste = Conseil::find($request->conseil_id);
                if (!$conseilExiste) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                /**
                 * @var ExistUser $userExist
                 */
                $userExist = new ExistUser();
                $phone = $userExist->userExistByPhone($request->phone);
                if ($phone) {
                    return $this->responseData("Oops numero lié a un utilisateur", false, Response::HTTP_NOT_FOUND, UserResource::make($phone));
                }

                $userMailExist = $userExist->userExistByEmail($request->email);
                if ($userMailExist) {
                    return $this->responseData("Oops email lié a un utilisateur", false, Response::HTTP_NOT_FOUND, UserResource::make($userMailExist));
                }
                $validatDate = $userExist->isValidDate($request->date_born);
                if (!$validatDate) {
                    return $this->responseData("Oops La date de naissance n\'est pas valide.", false, Response::HTTP_NOT_FOUND, null);
                }

                $isTwoOld = $userExist->isAtLeastTwoYearsOld($request->date_born);
                if (!$isTwoOld) {
                    return $this->responseData("Oops Vous devez avoir au moins 2 ans.", false, Response::HTTP_NOT_FOUND, null);
                }
                $user = User::create([
                    "firstname" => $request->firstname,
                    "lastname" => $request->lastname,
                    "email" => $request->email,
                    "phone" => $request->phone ?? null,
                    "address" => $request->address,
                    "status" => $request->status ?? null,
                    "specific_skills" => $request->specific_skills ?? null,
                    "password" => $request->password ?? "N@Fiz@2024",
                    "sexe" => $request->sexe
                ]);
                $thisUser = User::findOrfail($user->id);
                $thisUser->assignRole('student');
                $insertStudent = new UserService($user->id);

                $studentExist = $insertStudent->InsertUserStudent($request);
               if ($studentExist){
                return $this->responseData("student enregistré", true, Response::HTTP_OK, UserResource::make($user));
               }

               DB::rollBack();

            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function userStore(UserRequest $request){
        try {
            return DB::transaction(function () use ($request) {
                // $roleExiste = Role::find($request->role_id);
                // if (!$roleExiste) {
                //     return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                // }
                // $conseilExiste = Conseil::find($request->conseil_id);
                // if (!$conseilExiste) {
                //     return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                // }
                /**
                 * @var ExistUser $userExist
                 */
                // $userExist = new ExistUser();
                // $phone = $userExist->userExistByPhone($request->phone);
                // if ($phone) {
                //     return $this->responseData("Oops numero lié a un utilisateur", false, Response::HTTP_NOT_FOUND, UserResource::make($phone));
                // }

                // $userMailExist = $userExist->userExistByEmail($request->email);
                // if ($userMailExist) {
                //     return $this->responseData("Oops email lié a un utilisateur", false, Response::HTTP_NOT_FOUND, UserResource::make($userMailExist));
                // }
                // $validatDate = $userExist->isValidDate($request->date_born);
                // if (!$validatDate) {
                //     return $this->responseData("Oops La date de naissance n\'est pas valide.", false, Response::HTTP_NOT_FOUND, null);
                // }

                // $isTwoOld = $userExist->isAtLeastTwoYearsOld($request->date_born);
                // if (!$isTwoOld) {
                //     return $this->responseData("Oops Vous devez avoir au moins 2 ans.", false, Response::HTTP_NOT_FOUND, null);
                // }


                $user = User::create([
                    "role_id" => $request->role_id,
                    "firstname" => $request->firstname,
                    "lastname" => $request->lastname,
                    "email" => $request->email,
                    "phone" => $request->phone ?? null,
                    "address" => $request->address,
                    "status" => $request->status ?? null,
                    "specific_skills" => $request->specific_skills ?? null,
                    "password" => $request->password ?? "N@Fiz@2024",
                ]);

                return $this->responseData("Utilisateurs enregistres", true, Response::HTTP_OK, UserResource::make($user));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}

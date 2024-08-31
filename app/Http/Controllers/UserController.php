<?php

namespace App\Http\Controllers;

use App\Models\Conseil;
use App\Services\ExistUser;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\user\UserRequest;
use App\Http\Resources\user\UserResource;


class UserController extends Controller
{
<<<<<<< HEAD
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
=======
    use ResponseTrait, SlugTrait;
    /**
     * Display a listing of the resource.
     */


    public function AttributeRoleToUser(Request $request){
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->assignRole(['Admin']);
                return $this->responseData('Assignation de role effectue',$user->getPermissionsViaRoles(), true);
            }
            return $this->responseData('Assignation de role non effectue',false, false, null,Response::HTTP_NOT_FOUND);
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, false, null);
        }
    }


    public function getUserById(Request $request){
        return DB::transaction(function () use ($request){
            try {
                $user = User::find($request->id);
                if ($user) {
                    return $this->responseData('Utilisateur trouve',true,Response::HTTP_OK,UserResource::make($user));
                }
                return $this->responseData("L'utilisateur n'existe pas ", false, Response::HTTP_NOT_FOUND, null);

            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(),false,Response::HTTP_INTERNAL_SERVER_ERROR,null);
            }
        });
    }

    public function getUserByPhone(Request $request){
        return DB::transaction(function () use ($request){
            try {
                $user = User::where('phone', $request->phone)->first();
                if ($user) {
                    return $this->responseData('Utilisateur trouve',true,Response::HTTP_OK,UserResource::make($user));
                }
                return $this->responseData("L'utilisateur n'existe pas ", false, Response::HTTP_NOT_FOUND, null);

            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(),false,Response::HTTP_INTERNAL_SERVER_ERROR,null);
            }
        });
    }


    public function getUserByMail(Request $request){
        return DB::transaction(function () use ($request){
            try {
                $user = User::where('email', $request->mail)->first();
                if ($user) {
                    return $this->responseData('Utilisateur trouve',true,Response::HTTP_OK,UserResource::make($user));
                }
                return $this->responseData("L'utilisateur n'existe pas ", false, Response::HTTP_NOT_FOUND, null);

            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(),false,Response::HTTP_INTERNAL_SERVER_ERROR,null);
            }
        });
    }


    public function index()
    {
        return DB::transaction(function (){
            try {
                $allUser = User::all();
                return $this->responseData('Tous utilisateurs',true,Response::HTTP_OK,UserResource::collection($allUser));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(),false,Response::HTTP_INTERNAL_SERVER_ERROR,null);
            }
        });
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
<<<<<<< HEAD
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
                    // "role_id" => $roleExiste->id,Jj
                    "firstname" => $request->firstname,
                    "lastname" => $request->lastname,
                    "email" => $request->email,
                    "phone" => $request->phone ?? null,
                    "address" => $request->address,
                    "status" => $request->status ?? null,
                    "specific_skills" => $request->specific_skills ?? null,
                    "password" => $request->password ?? "N@Fiz@2024",
                ]);
                $user->assignRole('student');
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
=======
        return DB::transaction(function () use ($request){
            try {
                $user = User::create([
                    'lastname' => $request->lastname,
                    'firstname' => $request->firstname,
                    'email' => $request->email,
                    'date_of_birth' => $request->date_of_birth,
                    'password' => $request->password,
                    'pseudo' => $request->pseudo,
                    'sex' => $request->sex,
                ]);
                if ($user) {
                    $user->id_unknown = hash('sha1', $user->id);
                    $user->save();
                    return $this->responseData('Utilisateur ajoutee avec succees',true,Response::HTTP_OK,UserResource::make($user));
                }
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(),false,Response::HTTP_INTERNAL_SERVER_ERROR,null);
            }
        });
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show(User $user)
    {
        //
=======
    public function show(Request $request)
    {
        return DB::transaction(function () use ($request){
            try {
                return $this->responseData("", true, Response::HTTP_ACCEPTED,UserResource::make(User::where("id", $this->decodeSlug($request->user)["id"])->first()));
            } catch (\Throwable $th) {
                return $this->responseData("La resource inexistante", false, Response::HTTP_BAD_REQUEST);
            }
        });
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, User $user)
    {
        //
=======
    public function update(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $user = User::find($request->user);
                if ($user) {
                    $user->firstname = $request->firstname;
                    $user->lastname = $request->lastname;
                    $user->profil = $request->profil;
                    $user->pseudo = $request->pseudo;
                    $user->save();
                    return $user;
                    return $this->responseData('Modification effectuée', true, Response::HTTP_OK,UserResource::make($user));
                }
                return $this->responseData("L'utilisateur n'existe pas ", false, Response::HTTP_NOT_FOUND, null);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
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
=======
    public function destroy(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $User = User::find($request->user);
                if($User){
                    $User->delete();
                    return $this->responseData('Suppression effectuée', true, Response::HTTP_OK,UserResource::make($User));
                }
                return $this->responseData("L'utilisateur n'existe pas ", false, Response::HTTP_NOT_FOUND, null);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }
}

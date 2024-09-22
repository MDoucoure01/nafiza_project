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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PasswordResetMail;
use App\Notifications\PasswordResetSuccessNotification;
use App\Notifications\CreateUserNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
                // if($user->save()){
                //     $noHashUserpassword = $request->password ?? "N@Fiz@2024";
                //     $user->notify(new CreateUserNotification($noHashUserpassword, $user));
                // }
                $thisUser = User::findOrfail($user->id);
                $thisUser->assignRole('student');
                $insertStudent = new UserService($user->id);

                $studentExist = $insertStudent->InsertUserStudent($request);
                if ($studentExist) {
                    return $this->responseData("student enregistré", true, Response::HTTP_OK, UserResource::make($user));
                }
                DB::rollBack();
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    public function edit(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'email' => "email|unique:users,email",
                'firstname' => "required",
                'lastname' => "required",
                'phone' => "required",
                'address' => "required",
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => "Erreur de validation",
                    "errors" => $validator->errors(),
                ], 422);
            }
            $request->user()->update($input);
            return response()->json([
                "status" => true,
                "message" => "Utilisateur mis à jour avec success",
                "data" => $request->user(),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return DB::transaction(function () use ($user) {
                if (Auth::id() != $user->id) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                return $this->responseData("afficher un utilisateur", true, Response::HTTP_OK, UserResource::make($user));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            return DB::transaction(function () use ($request, $user) {
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->save();
                return $this->responseData("Modification réussie", true, Response::HTTP_ACCEPTED, $user);
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {}

    /**
     * Reset password
     */

     public function sendPasswordResetMail(Request $request)
     {
        // print_r('ok');
         $userEmail = $request->email;
        //  dd($userEmail);
         $user = User::where('email', $userEmail)->first();
        //  dd($user);
         $findUser = User::findOrFail($user->id);
         $findUser->notify(new PasswordResetMail($user));
         $response = [
             'success' => true,
             'data' => $findUser,
             'message' => 'Mail envoyé avec succès.',
         ];

         return response()->json($response, 200);
     }

     public function updateUserPassword($userToken, Request $request)
     {
        // dd($userToken);
         $userInfos = User::where('remember_token', $userToken)->first();
         $user = User::findOrFail($userInfos->id);

         $user->password = ($request->password);

         if ($user->save()) {
             $response = [
                 'success' => true,
                 'data' => $user,
                 'message' => 'Mot de passe modifié avec succès.',
             ];
             $user->noHashingPassword = $request->password;
             $user->notify(new PasswordResetSuccessNotification($user));

             return response()->json($response, 200);
         } else {
             $response = [
                 'success' => false,
                 'message' => 'Mot de passe non modifié.',
             ];

             return response()->json($response, 400);
         }
     }

     public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => [
                'required',
                'max:150',
                'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
        ]);
        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)){
            return response()->json([
                'message' => 'Désolé, aucune modification effectuer',
            ], 401);
        }

        $user->password = bcrypt($request->new_password);
        if ($user->save()){
            return response()->json([
                'message' => 'Mot de passe modifé avec succès',
            ],200);
        }

        else{
            return response()->json([
                'message' => 'Erreur rencontrer dans notre server',
            ], 500);
        }

    }
}

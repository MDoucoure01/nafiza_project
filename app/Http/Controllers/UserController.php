<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return DB::transaction(function () use ($request){
            try {
                return $this->responseData("", true, Response::HTTP_ACCEPTED,UserResource::make(User::where("id", $this->decodeSlug($request->user)["id"])->first()));
            } catch (\Throwable $th) {
                return $this->responseData("La resource inexistante", false, Response::HTTP_BAD_REQUEST);
            }
        });
    }

    /**
     * Update the specified resource in storage.
     */
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
    }

    /**
     * Remove the specified resource from storage.
     */
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
    }
}

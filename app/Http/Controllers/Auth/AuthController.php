<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Response;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    use ResponseTrait;

    public function register(Request $request)
    {
        try {
            //code...
            $input = $request->all();
            $validator = Validator::make($input, [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => "required|email|unique:users|email",
                'phone' => 'required',
                'address' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => "Erreur de validation",
                    "errors" => $validator->errors()
                ], 422);
            }
            $input['password'] = Hash::make($request->password);
            $user = User::create($input);
            $token = $user->createToken('token')->accessToken;
            return response()->json([
                "status" => true,
                "message" => "Utilisateur enregistrés avec succés .... ",
                "data" => [
                    "token" => $user->createToken('auth_user')->plainTextToken,
                    "token_type" => "Bearer",
                ],
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage()

            ], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            return DB::transaction(function () use ($request){
                $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
                $credentials = [
                    $field => $request->input('username'),
                    'password' => $request->input('password')
                ];

                if (Auth::attempt($credentials)) {
                    /**@var User $user */
                    $user = Auth::user();
                    $token = $user->createToken('token')->plainTextToken;
                    return $this->responseData('Connection réussie ...', true, Response::HTTP_OK, ["user" => UserResource::make($user), "Token" => $token]);
                }
                return response(['message' => 'le login ou le mot de passe est erroné'], 401);
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }


    public function logout()
    {
        try {
            return DB::transaction(function (){
                /**@var User $user */
                $user = Auth::user();
                $user->tokens()->delete();
                return $this->responseData("Deconnexion réussie", true, Response::HTTP_ACCEPTED);
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Response;
use App\Traits\ResponseTrait;
Use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    use ResponseTrait;

    public function register(Request $request){
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

    public function login(Request $request)
    {
        try {
            //code...
            $input = $request->all();
            $validator = Validator::make($input, [
                'email' => "required|email",
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => "Erreur de validation",
                    "errors" => $validator->errors(),
                ], 422);
            }
            if(!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    "status" => false,
                    "message" => "Login ou mot de passe incorrect",
                    "errors" => $validator->errors(),
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            return response()->json([
                "status" => true,
                "message" => "Connection spécie ...",
                "data" => [
                    "token" => $user->createToken('auth_user')->plainTextToken,
                    "token_type" => "Bearer",
                ],
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request){
        $accessToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($accessToken);
        $token->delete();

        // $token = $request->user()->currentAccessToken();
        // $request->user()->tokens()->where('id', $token->id)->delete();
        return response()->json([
            "status" => true,
            "message" => "Déconnecté avec succès ...",
        ]);
    }

    public function profile(Request $request){
        return response()->json([
            "status" => true,
            "message" => "Profile utilisateur ...",
            "data" => $request->user(),
        ]);
    }
    
}

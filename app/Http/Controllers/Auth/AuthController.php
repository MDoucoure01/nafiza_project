<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\user\UserResource;
use Illuminate\Http\Response;
use App\Traits\ResponseTrait;
Use Validator;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login(LoginRequest $request)
    {
        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = [
            $field => $request->input('username'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->accessToken;
            return $this->responseData('Connection réussie ...', true, Response::HTTP_OK, ["user"=>UserResource::make($user),"Token"=>$token]);
        }
        return response(['message' => 'le login ou le mot de passe est erroné'], 401);
    }

}

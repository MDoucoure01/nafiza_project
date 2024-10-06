<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comites\ComiteResource;
use App\Http\Resources\Comites\ComiteWithConseilResource;
use App\Jobs\SendMailBienvenue;
use App\Models\Comite;
use App\Models\User;
use App\Notifications\CreateUserNotification;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ComiteController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData("liste comités avec ses conseils", true, Response::HTTP_OK, ComiteWithConseilResource::collection(Comite::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comite $comite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comite $comite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comite $comite)
    {
        //
    }

    public function testMail()
    {
        try {
            $user = User::where('email', "babacar.sy9792@gmail.com")->first();
            // $user->notify(new CreateUserNotification($user));
            SendMailBienvenue::dispatch($user);
            // Mail::to($user->email)->queue(new SendMailBienvenue($user));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
}

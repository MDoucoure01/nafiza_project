<?php

namespace App\Http\Controllers;

use App\Http\Resources\Subscriptions\SubscriptionWithoutCohortResource;
use App\Models\School_session;
use App\Models\Subscription;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function (){
                $actifAnnee = School_session::where('status',true)->first();
                if (!$actifAnnee) {
                    return $this->responseData("Oops aucun année active", false, Response::HTTP_NOT_FOUND, null);
                }
                $subscriptions = Subscription::where('school_session_id',$actifAnnee->id)->where('is_active', true)->get();
                return $this->responseData("Tous les Utilisateurs", true, Response::HTTP_OK, SubscriptionWithoutCohortResource::collection($subscriptions));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
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
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}

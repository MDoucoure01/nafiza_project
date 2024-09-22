<?php

namespace App\Http\Controllers;

use App\Http\Resources\Cohorts\CohortSessionResource;
use App\Models\Cohort;
use App\Models\School_session;
use App\Models\Session_Cohort;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CohortController extends Controller
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
                return CohortSessionResource::make($actifAnnee);
                $sessionActif = Session_Cohort::where('school_session_id',$actifAnnee->id)->get();
                return $this->responseData("Tous les Cohort", true, Response::HTTP_OK, CohortSessionResource::collection($sessionActif));

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
    public function show(Cohort $cohort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cohort $cohort)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cohort $cohort)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Professions\ProfessionRequest;
use App\Http\Resources\Professions\ProfessionResource;
use App\Models\Profession;
use App\Services\ExistUser;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData("Tous les Languages", true, Response::HTTP_OK, ProfessionResource::collection(Profession::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessionRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $element
                 */
                $element = new ExistUser();
                $professionExist = $element->elementExist(Profession::class, "name", ucfirst($request->name));
                if ($professionExist) {
                    return $this->responseData("Le Profession exist déja", false, Response::HTTP_CONFLICT, ProfessionResource::make($professionExist));
                }
                $language = Profession::create([
                    "name" => ucfirst($request->name)
                ]);
                return $this->responseData("Profession enregistré avec success", true, Response::HTTP_OK, ProfessionResource::make($language));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        try {
            return DB::transaction(function () use ($profession){
                return $this->responseData("Affichage du Profession avec success", true, Response::HTTP_OK, ProfessionResource::make($profession));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profession $profession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        try {
            return DB::transaction(function () use ($profession) {
                $profession->delete();
                return $this->responseData("suppression reussi", true, Response::HTTP_OK, ProfessionResource::make($profession));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}

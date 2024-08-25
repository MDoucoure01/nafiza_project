<?php

namespace App\Http\Controllers;

use App\Http\Requests\Languages\LanguageRequest;
use App\Http\Resources\LanguagesResource;
use App\Models\Language;
use App\Services\ExistUser;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class LanguageController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData("Tous les Languages", true, Response::HTTP_OK, LanguagesResource::collection(Language::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $element
                 */
                $element = new ExistUser();
                $languageExist = $element->elementExist(Language::class, "name", $request->name);
                if ($languageExist) {
                    return $this->responseData("Le language exist déja", false, Response::HTTP_CONFLICT, LanguagesResource::make($languageExist));
                }
                $language = Language::create([
                    "name" => ucfirst($request->name)
                ]);
                return $this->responseData("Language enregistré avec success", true, Response::HTTP_OK, LanguagesResource::make($language));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        try {
            return DB::transaction(function () use ($language){
                return $this->responseData("Affichage du Language avec success", true, Response::HTTP_OK, LanguagesResource::make($language));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        try {
            return DB::transaction(function () use ($language) {
                $language->delete();
                return $this->responseData("suppression reussi", true, Response::HTTP_OK, LanguagesResource::make($language));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}

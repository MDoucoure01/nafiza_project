<?php

namespace App\Http\Controllers;

use App\Traits\PdfTrait;
use App\Models\Bibliotheque;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Bibliotheques\BibliothequeRequest;
use App\Http\Resources\Bibliotheques\BibliothequeResource;

class BibliothequeController extends Controller
{
    use ResponseTrait, PdfTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData('Tous les biblioteques', true, Response::HTTP_OK, BibliothequeResource::collection(Bibliotheque::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    public function getBibliothequesUser($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                if (Auth::user()->id == $id) {
                    return $this->responseData('Tous les biblioteques', true, Response::HTTP_OK, BibliothequeResource::collection(Bibliotheque::where("user_id", $id)->get()));
                }
                return $this->responseData('Demandeur non connecter...', false, Response::HTTP_BAD_REQUEST, null);
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BibliothequeRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {

                if ($request->hasFile("file")) {
                    $file = $this->loadPdf($request);
                }
                $biblio = Bibliotheque::create([
                    "user_id" => Auth::id(),
                    "author" => $request->author,
                    "title" => $request->title,
                    "Description" => $request->description,
                    "file" => $file,
                    "date" => now(),
                    "Source" => $request->source ?? ""
                ]);
                return $this->responseData('Vous avez enregistré avec succée...', true, Response::HTTP_OK, $biblio);
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bibliotheque $bibliotheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bibliotheque $bibliotheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bibliotheque $bibliotheque)
    {
        //
    }
}

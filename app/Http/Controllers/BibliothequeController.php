<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bibliotheques\BibliothequeCommentRequest;
use App\Traits\PdfTrait;
use App\Models\Bibliotheque;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Bibliotheques\BibliothequeRequest;
use App\Http\Resources\Bibliotheques\BibliothequeResource;
use App\Http\Resources\Bibliotheques\CommentBibliothequeResource;
use App\Http\Resources\Bibliotheques\LikeBibliothequeResource;
use App\Models\Commentbibliotheques;
use App\Models\Likebibliotheques;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        try {
            return DB::transaction(function () use ($bibliotheque) {
                return $this->responseData('biblioteque...', true, Response::HTTP_OK, BibliothequeResource::make($bibliotheque));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bibliotheque $bibliotheque)
    {
    }

    public function updateBibliotheques(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $bibliotheque = Bibliotheque::where("id", $request->id)->first();
                if ($bibliotheque->user_id != Auth::id()) {
                    return $this->responseData('Vous n\'êtes pas autorisé à modifier cette bibliothèque.', false, Response::HTTP_FORBIDDEN, null);
                }
                if ($request->hasFile("file")) {
                    $file = $this->loadPdf($request);
                    if ($bibliotheque->file) {
                        Storage::delete($bibliotheque->file);
                    }
                    $bibliotheque->file = $file;
                }
                $bibliotheque->author = $request->author;
                $bibliotheque->title = $request->title;
                $bibliotheque->Description = $request->description;
                $bibliotheque->Source = $request->source ?? $bibliotheque->source;
                $bibliotheque->save();

                return $this->responseData('Bibliothèque mise à jour avec succès.', true, Response::HTTP_OK, BibliothequeResource::make($bibliotheque));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bibliotheque $bibliotheque)
    {
        try {
            return DB::transaction(function () use ($bibliotheque) {
                $bibliotheque->delete();
                return $this->responseData('biblioteque supprime ...', true, Response::HTTP_OK, BibliothequeResource::make($bibliotheque));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    public function bibliothequesComment(BibliothequeCommentRequest $request, $bibliotheque_id, $user_id)
    {
        try {
            return DB::transaction(function () use ($request, $bibliotheque_id, $user_id) {
                $bibliotheque = Bibliotheque::find($bibliotheque_id);
                $user = User::find($user_id);

                // if ($user->id == Auth::user()->id) {
                //     return $this->responseData('Vous ne pouvez pas commenter votre propre post.', false, Response::HTTP_FORBIDDEN, null);
                // }

                if (!$bibliotheque || !$user) {
                    return $this->responseData('Ressource introuvable.', false, Response::HTTP_NOT_FOUND, null);
                }
                $comment = Commentbibliotheques::create([
                    "bibliotheque_id" => $bibliotheque_id,
                    "user_id" => $user_id,
                    "content" => $request->content
                ]);
                return $this->responseData('Commentaire ajouté avec succès.', true, Response::HTTP_OK, CommentBibliothequeResource::make($comment));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }

    public function deleteBibliotheque(Request $request, $bibliotheque_id)
    {
        try {
            return DB::transaction(function () use ($request, $bibliotheque_id) {
                $comment = Commentbibliotheques::find($bibliotheque_id);
                if (!$comment) {
                    return $this->responseData('Commentaire introuvable.', false, Response::HTTP_NOT_FOUND, null);
                }

                /**
                 * a decommenter quant sa route est dans le middelware de connexion
                 */

                if ($comment->user_id != Auth::user()->id) {
                    return $this->responseData('Vous n\'êtes pas autorisé à supprimer ce commentaire.', false, Response::HTTP_FORBIDDEN, null);
                }
                $comment->delete();
                return $this->responseData('Commentaire supprimé avec succès.', true, Response::HTTP_OK, CommentBibliothequeResource::make($comment));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }


    public function bibliothequesLike(Request $request, $bibliotheque_id, $user_id)
    {
        try {
            return DB::transaction(function () use ($request, $bibliotheque_id, $user_id) {
                $post = Bibliotheque::find($bibliotheque_id);
                $user = User::find($user_id);
                // if ($user->id == auth::user()->id) {
                //     return $this->responseData('Resource inexistant...', false, Response::HTTP_NOT_FOUND, null);
                // }

                if (!$post || !$user) {
                    return $this->responseData('Resource inexistant...', false, Response::HTTP_NOT_FOUND, null);
                }

                $isLiked = Likebibliotheques::
                where('user_id', $user->id)->
                where('bibliotheque_id',$post->id)->first();
                if ($isLiked) {
                    $isLiked->delete();
                    return $this->responseData('Vous avez désliké ce post avec succès.', true, Response::HTTP_OK, LikeBibliothequeResource::make($isLiked));
                } else {
                    $Likepost = Likebibliotheques::create([
                        'user_id' => $user->id,
                        'bibliotheque_id' => $post->id
                    ]);
                    return $this->responseData('Vous avez liké ce post avec succès.', true, Response::HTTP_OK, LikeBibliothequeResource::make($Likepost));
                }
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
        }
    }
}

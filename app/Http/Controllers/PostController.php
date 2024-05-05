<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Likepost;
use App\Models\Commentpost;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\PostRequest;
use App\Http\Resources\Posts\PostResource;
use App\Http\Requests\Post\CommentPostRequest;
use App\Http\Resources\Posts\LikePostResource;
use App\Http\Resources\Posts\CommentPostResource;
use App\Http\Resources\Posts\PostNumberLikesCommentsResource;


class PostController extends Controller
{
    use ResponseTrait;

    public function PostByUser(Request $request){
        return DB::transaction(function () use ($request) {
            try {
                if(Auth::id() == User::where("id", $request->id)->first()->id){
                    $posts = Post::where('user_id', $request->id)->get();
                    return $this->responseData('Affichages de tout les posts', true, Response::HTTP_OK, PostNumberLikesCommentsResource::collection($posts));
                } else {
                    return $this->responseData('Demandeur non connecter...', false, Response::HTTP_BAD_REQUEST, null);
                }
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }

    public function DeletePost(Request $request){
        return DB::transaction(function () use ($request) {
            try {
                $post = Post::where('id', $request->id)->first();
                if ($post) {
                    if(Auth::id() == $post->user_id){
                        $post = Post::where('id', $request->id)->first();
                        $post->delete();
                        return $this->responseData('Post supprimé', true, Response::HTTP_OK, PostResource::make($post));
                    } else {
                        return $this->responseData('Demandeur non connecter...', false, Response::HTTP_BAD_REQUEST, null);
                    }
                }
                return $this->responseData('Ressource inexistant...', false, Response::HTTP_BAD_REQUEST, null);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                return $this->responseData('Affichages de tout les posts', true, Response::HTTP_OK, PostNumberLikesCommentsResource::collection(Post::all()));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $post = new Post();
                $post->user_id = $request->user()->id;
                $post->title = $request->input('title');
                $post->media_type = $request->input('media_type');
                $post->media_link = $request->file('media_link')->store('media_link');

                if ($request->hasFile('media_thumbnail')) {
                    $post->media_thumbnail = $request->file('media_thumbnail')->store('media_link');
                }

                $post->visibility = $request->input('visibility');
                $post->description = $request->input('description');

                if ($post->save()) {
                    return $this->responseData('Vous avez enregistré avec succée...', true, Response::HTTP_OK, PostResource::make($post));
                } else {
                    return $this->responseData('Enregistrement non effectuée...', false, Response::HTTP_BAD_REQUEST, null);
                }
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });

    }

    public function postLike(Request $request, $post_id, $user_id)
    {
        return DB::transaction(function () use ($request, $post_id, $user_id) {
            try {
                $post = Post::find($post_id);
                $user = User::find($user_id);
                if ($user->id == auth::user()->id) {
                    return $this->responseData('Resource inexistant...', false, Response::HTTP_NOT_FOUND, null);
                }

                if (!$post || !$user) {
                    return $this->responseData('Resource inexistant...', false, Response::HTTP_NOT_FOUND, null);
                }

                $isLiked = Likepost::
                where('user_id', $user->id)->
                where('post_id',$post->id)->first();
                if ($isLiked) {
                    $isLiked->delete();
                    return $this->responseData('Vous avez désliké ce post avec succès.', true, Response::HTTP_OK, LikePostResource::make($isLiked));
                } else {
                    $Likepost = Likepost::create([
                        'user_id' => $user->id,
                        'post_id' => $post->id
                    ]);
                    return $this->responseData('Vous avez liké ce post avec succès.', true, Response::HTTP_OK, LikePostResource::make($Likepost));
                }
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }


    public function postComment(CommentPostRequest $request, $post_id, $user_id)
    {
        return DB::transaction(function () use ($request, $post_id, $user_id) {
            try {
                $post = Post::find($post_id);
                $user = User::find($user_id);

                // if ($user->id == Auth::user()->id) {
                //     return $this->responseData('Vous ne pouvez pas commenter votre propre post.', false, Response::HTTP_FORBIDDEN, null);
                // }

                if (!$post || !$user) {
                    return $this->responseData('Ressource introuvable.', false, Response::HTTP_NOT_FOUND, null);
                }

                $comment = Commentpost::create([
                    "post_id" => $post_id,
                    "user_id" => $user_id,
                    "content" => $request->content
                ]);
                return $this->responseData('Commentaire ajouté avec succès.', true, Response::HTTP_OK, CommentPostResource::make($comment));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }


    public function deleteComment(Request $request, $comment_id)
    {
        return DB::transaction(function () use ($request, $post_id, $user_id) {
            try {
                $comment = Commentpost::find($comment_id);
                if (!$comment) {
                    return $this->responseData('Commentaire introuvable.', false, Response::HTTP_NOT_FOUND, null);
                }
                if ($comment->user_id != Auth::user()->id) {
                    return $this->responseData('Vous n\'êtes pas autorisé à supprimer ce commentaire.', false, Response::HTTP_FORBIDDEN, null);
                }
                $comment->delete();
                return $this->responseData('Commentaire supprimé avec succès.', true, Response::HTTP_OK, CommentPostResource::make($comment));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        return DB::transaction(function () use ($request) {
            try {
                $post = Post::where('id', $request->id)->first();
                if (!$post) {
                    return $this->responseData('Resource inexistant...', false, Response::HTTP_NOT_FOUND, null);
                }
                if(Auth::id() == $post->user_id){


                    $post->user_id =  Auth::id();
                    $post->media_type = $request->input('media_type');
                    $post->media_link = $request->file('media_link')->store('media_link');

                    if ($request->hasFile('media_thumbnail')) {
                        $post->media_thumbnail = $request->file('media_thumbnail')->store('media_link');
                    }

                    $post->visibility = $request->input('visibility');
                    $post->description = $request->input('description');
                    $post->title = $request->input('title');
                    $post->save();

                    return $this->responseData('Modifications effetuées avec succès', true, Response::HTTP_OK, PostResource::make($post));
                }
                return $this->responseData('Impossible d\'effectué cette modification...', false, Response::HTTP_NOT_FOUND, null);

            } catch (\Throwable $th) {
                //throw $th;
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return "Ok";
    }
}

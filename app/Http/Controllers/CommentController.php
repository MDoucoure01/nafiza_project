<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CommentRequest;
use App\Http\Resources\Comments\CommentResource;
use App\Models\Comments;
use App\Models\CourseItems;
use App\Models\User;
use App\Services\ExistUser;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $userExist
                 */
                $userExist = new ExistUser();
                $user = $userExist->elementExist(User::class, "id", $request->user_id);
                if (!$user) {
                    return $this->responseData("Utilisateur non existant", false, Response::HTTP_NOT_FOUND, null);
                }
                $courItems = $userExist->elementExist(CourseItems::class, "id", $request->course_items_id);
                if (!$courItems) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }

                $comment = Comments::create([
                    "user_id" => $request->user_id,
                    "course_items_id" => $request->course_items_id,
                    "content" => $request->content,
                ]);
                return $this->responseData("Commentaire enregistré", true, Response::HTTP_OK, CommentResource::make($comment));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}

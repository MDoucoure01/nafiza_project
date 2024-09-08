<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseItems\CourseItemsRequest;
use App\Http\Resources\CourseItems\CourseItemResource;
use App\Http\Resources\CourseItems\CourseItemsCommentResource;
use App\Http\Resources\Modules\ModuleResource;
use App\Models\Course;
use App\Models\CourseItems;
use App\Models\Module;
use App\Models\User;
use App\Services\ExistUser;
use App\Traits\ImageTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CourseItemsController extends Controller
{
    use ResponseTrait, ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData("liste forum", true, Response::HTTP_OK, CourseItemResource::collection(CourseItems::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseItemsRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $element
                 */
                $element = new ExistUser();
                $courseExiste = $element->elementExist(Course::class, "id", $request->course_id);
                if (!$courseExiste) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                $UserExiste = $element->elementExist(User::class, "id", $request->user_id);;
                if (!$UserExiste) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                if (!$UserExiste->hasRole('professor')) {
                    return $this->responseData("Accès refusé : l'utilisateur n'est pas un professeur", false, Response::HTTP_FORBIDDEN, null);
                }

                if ($request->hasFile('image')) {
                    $image = $this->load($request);
                }
                if ($request->hasFile('file')) {
                    $file = $this->loadFile($request);
                }

                $courseItems = CourseItems::create([
                    "course_id" => $request->course_id,
                    "user_id" => $request->user_id,
                    "content" => $request->content,
                    "file" => $file,
                    "image" => $image,
                    "link" => $request->link
                ]);

                return $this->responseData("Enregistrement effectuée", true, Response::HTTP_OK, CourseItemResource::make($courseItems));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseItems $courseItems)
    {
        return $courseItems;
        try {
            return DB::transaction(function () use ($courseItems) {
                return $this->responseData("Enregistrement effectuée", true, Response::HTTP_OK, CourseItemResource::make($courseItems));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseItems $courseItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseItems $courseItems)
    {
        //
    }

    public function getCourseItems(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $element
                 */
                $element = new ExistUser();
                $courseExiste = $element->elementExist(Course::class, "id", $request->id);
                if (!$courseExiste) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                $courseItems = CourseItems::where("course_id", $courseExiste->id)->get();
                return $this->responseData("affichage forum du cour", true, Response::HTTP_OK, CourseItemResource::collection($courseItems));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    public function getCommentToCourseItems(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $element
                 */
                $element = new ExistUser();
                $courseExiste = $element->elementExist(CourseItems::class, "id", $request->id);
                if (!$courseExiste) {
                    return $this->responseData("Oops donnée incohérent", false, Response::HTTP_NOT_FOUND, null);
                }
                return $this->responseData("Affichage commentaire du cour", true, Response::HTTP_OK, CourseItemsCommentResource::make($courseExiste));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    public function getModulesSession(Request $request) {
        try {
            return DB::transaction(function () use ($request){
                $modulesSession = Module::where('school_session_id', $request->appActuSession->id)->get();
                return $this->responseData("Affichage commentaire du cour", true, Response::HTTP_OK, ModuleResource::collection($modulesSession));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}

<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\ComiteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseItemsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TextbookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("languages", LanguageController::class);
Route::apiResource("profession", ProfessionController::class);
Route::apiResource("role", RoleController::class);
Route::apiResource("subscription", SubscriptionController::class);
Route::post('update-user-password/{user_token}', [UserController::class, 'updateUserPassword']);
Route::get('send-reset-password', [UserController::class, 'sendPasswordResetMail']);
Route::post("user/subscription", [UserController::class, "store"]);

Route::post('textbooks', [TextbookController::class, 'store']);
Route::get('/textbooks', [TextbookController::class, 'index']);


// Route::post('user/login', [AuthController::class, 'login']);

// Route::post("user/store",[UserController::class,"userStore"]);
// Route::apiResource("promo",PromoController::class);
// Route::post("update/user/{user}",[UserController::class,"updateUser"]);
Route::get("test",[StudentController::class,"test"]);
Route::apiResource("cohort",CohortController::class);

Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource("user", UserController::class);
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::delete('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::get('/professor/profile', [ProfessorController::class, 'showProfile']);
    Route::put('/professor/profile', [ProfessorController::class, 'updateProfile']);
    Route::get('/student/profile', [StudentController::class, 'showProfile']);
    Route::put('/student/profile', [StudentController::class, 'updateProfile']);
    Route::put('auth/edit-profile', [UserController::class, 'edit']);
    Route::get("user/{id}/comrade", [StudentController::class, 'comradeUser']);

});
Route::apiResource("course/items",CourseItemsController::class);
Route::get("get/course/{id}/items",[CourseItemsController::class, "getCourseItems"]);
ROute::apiResource("comment", CommentController::class);
Route::get("course/items/{id}/comment", [CourseItemsController::class, "getCommentToCourseItems"]);
Route::get("modules/sessions",[CourseItemsController::class,"getModulesSession"]);
Route::get("modules/courses/elements",[CourseItemsController::class,"getModulesCourseItemsElements"]);
Route::apiResource("comite",ComiteController::class);
Route::get("test/test",[ComiteController::class,"testMail"]);

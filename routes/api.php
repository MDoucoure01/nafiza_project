<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BibliothequeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;


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

//utilisateur
Route::apiResource('user', UserController::class);
Route::post('user/login', [AuthController::class, 'login']);
Route::get('user/{id}', [UserController::class, 'getUserById']);
Route::get('user/{mail}/mail', [UserController::class, 'getUserByMail']);
Route::get('user/{phone}/phone', [UserController::class, 'getUserByPhone']);
Route::post('user/{id}/role', [UserController::class, 'AttributeRoleToUser']);
Route::post("login", [AuthController::class, 'login']);
//role
Route::post('role/{id}/permissions', [RoleController::class, 'attributePermissionToARole']);
Route::post('role/add', [RoleController::class, 'CreateRole']);

//permissions
Route::post('permission/add', [PermissionController::class, 'CreatePermission']);
// Route::apiResource('sensibilisation',SensibilisationController::class)->only(['index','store','update','destroy']);


// Posts
Route::middleware("auth:api")->group(function(){
    Route::resource('posts', PostController::class);
    Route::get('feeds', [PostController::class,'index']);
    Route::get('post/{id}/user', [PostController::class,'PostByUser']);
    Route::delete('post/{id}', [PostController::class,'DeletePost']);
    Route::post('post/{id}/update', [PostController::class,'update']);

    Route::post('post/{post_id}/like/user/{user_id}', [PostController::class,'postLike']);
    Route::post('post/{post_id}/comment/user/{user_id}', [PostController::class,'postComment']);
    Route::delete('comment/{comment_id}', [PostController::class, 'deleteComment']);
    Route::apiResource('bibliotheques',BibliothequeController::class);
    Route::post('bibliotheques/{id}/update', [BibliothequeController::class, 'updateBibliotheques']);
    Route::get('bibliotheques/user/{id}',[BibliothequeController::class, 'getBibliothequesUser']);
});


// Route::resource('comments', CommentController::class);
            // Route::post('like-unlike-post', [LikeController::class,'store']);
            // Route::post('follow-unfollow-user', [FollowerController::class,'store']);
            // Route::get('feeds', [PostController::class,'index']);



// Ouvrages
// Route::resource('ouvrages', OuvrageController::class);
// Route::resource('comments', CommentController::class);
// Route::get('feeds', [PostController::class, 'index']);

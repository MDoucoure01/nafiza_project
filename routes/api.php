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

Route::apiResource("languages",LanguageController::class);
Route::apiResource("profession",ProfessionController::class);
Route::apiResource("role",RoleController::class);
Route::apiResource("user",UserController::class);

// Route::post('user/login', [AuthController::class, 'login']);

// Route::post("user/store",[UserController::class,"userStore"]);
// Route::apiResource("promo",PromoController::class);
// Route::post("update/user/{user}",[UserController::class,"updateUser"]);

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::delete('auth/logout', [AuthController::class, 'logout']);
// });




Route::get('/professor/profile', [ProfessorController::class, 'showProfile']);
Route::put('/professor/profile', [ProfessorController::class, 'updateProfile']);

Route::get('/student/profile', [StudentController::class, 'showProfile']);
Route::put('/student/profile', [StudentController::class, 'updateProfile']);
    Route::get('auth/profile', [AuthController::class, 'profile']);
    Route::put('auth/edit-profile', [UserController::class, 'edit']);


});

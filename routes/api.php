<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::post("user/store",[UserController::class,"userStore"]);
// Route::apiResource("promo",PromoController::class);
// Route::post("update/user/{user}",[UserController::class,"updateUser"]);

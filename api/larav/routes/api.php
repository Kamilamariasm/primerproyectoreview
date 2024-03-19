<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\JointController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\AuthController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/schedules',[ScheduleController::class, 'list']);
Route::get('/schedules/{id}',[ScheduleController::class, 'item']);
Route::post('/schedules/create',[ScheduleController::class, 'create']);
Route::post('/schedules/{id}/update',[ScheduleController::class, 'update']);


Route::get('/joints',[JointController::class, 'list']);
Route::get('/joints/{id}',[JointController::class, 'item']);
Route::post('/joints/create',[JointController::class, 'create']);
Route::post('/joints/{id}/update',[JointController::class, 'update']);



Route::get('/locations',[LocationController::class, 'list']);
Route::get('/locations/{id}',[LocationController::class, 'item']);
Route::post('/locations/create',[LocationController::class, 'create']);
Route::post('/locations/{id}/update',[LocationController::class, 'update']);




Route::get('/users',[UserController::class, 'list']);
Route::get('/users/{id}',[UserController::class, 'item']);
Route::post('/users/create',[UserController::class, 'create']);
Route::post('/users/{id}/update', [UserController::class, 'update']);


Route::get('/reviews',[ReviewController::class, 'list']);
Route::get('/reviews/{id}',[ReviewController::class, 'item']);
Route::post('/reviews/create',[ReviewController::class, 'create']);
Route::post('/reviews/{id}/update',[ReviewController::class, 'update']);

Route::get('/comments',[CommentController::class, 'list']);
Route::get('/comments/{id}',[CommentController::class, 'item']);
Route::post('/comments/create',[CommentController::class, 'create']);
Route::post('/comments/{id}/update',[CommentController::class, 'update']);


Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile']);
    Route::post('/profile/update', [UserController::class, 'updateProfile']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user/{id}/name', [UserController::class, 'fetchUserName']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\JointController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReviewController;





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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/schedules',[ScheduleController::class, 'list']);
Route::get('/schedules/{id}',[ScheduleController::class, 'item']);

Route::get('/joints',[jointController::class, 'list']);
Route::get('/joints/{id}',[jointController::class, 'item']);

Route::get('/locations',[locationController::class, 'list']);
Route::get('/locations/{id}',[locationController::class, 'item']);

Route::get('/owners',[ownerController::class, 'list']);
Route::get('/owners/{id}',[ownerController::class, 'item']);

Route::get('/users',[userController::class, 'list']);
Route::get('/users/{id}',[userController::class, 'item']);

Route::get('/reviews',[reviewController::class, 'list']);
Route::get('/reviews/{id}',[reviewController::class, 'item']);
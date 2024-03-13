<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\JointController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/old', function () {
    return view('welcome');
});


Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminController::class,'index'])->name('admin.panel');
Route::get('/joints',[JointController::class,'index'])->name('Joints.Joints');
Route::get('/locations',[LocationController::class,'index'])->name('Locations.Locations');
Route::get('/reviews',[ReviewController::class,'index'])->name('Reviews.Reviews');
Route::get('/schedules',[ScheduleController::class,'index'])->name('Schedules.Schedules');
Route::get('/users',[UserController::class,'index'])->name('Users.Users');
Route::get('/comments',[CommentController::class,'index'])->name('Comments.Comments');




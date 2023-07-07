<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Workshops;
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

Route::get('/majors',[SkillController::class,'getmajors']);
Route::get('/majors/{id}',[SkillController::class,'getmajor']);
Route::get('/schools/{id}',[SchoolController::class,'getschool']);
Route::get('/workshops',[Workshops::class,'getWorkshops']);
Route::get('/workshop/{id}',[Workshops::class,'getWorkshop']);
Route::get('/user/{id}',[UserController::class,'getUser']);



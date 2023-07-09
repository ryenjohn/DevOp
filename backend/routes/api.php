<?php

use App\Http\Controllers\MajorController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Resources\SubjectResource;
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


// Route::get('/majors/{id}',[SkillController::class,'MajorDetail']);


// User side -----------------------------------------
Route::post('/users',[UserController::class, 'store']);
Route::get('/users',[UserController::class, 'index']);
Route::post('/roles',[RoleController::class, 'store']);

Route::get('/schools/{id}',[SchoolController::class,'getschool']);
Route::get('/schools',[SchoolController::class,'getschools']);

// Major route
Route::get('/skills',[SkillController::class,'getSkills']);
Route::get('/skills/{id}',[SkillController::class,'getSkillById']);
Route::post('/skills',[SkillController::class,'createSkill']);
Route::put('/skills/{id}',[SkillController::class,'editeSkill']);
Route::delete('/skills/{id}',[SkillController::class,'deleteSkill']);

// subject route
Route::get('/subjects',[SkillController::class,'getSubjects']);

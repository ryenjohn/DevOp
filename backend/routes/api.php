<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MajorController;

use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\RegisterMailcontroller;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkShopController;
use App\Http\Controllers\SubjectController;
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
// Route::get('/users',[UserController::class, 'index']);
Route::post('/roles',[RoleController::class, 'store']);

// Route::get('/majors',[SkillController::class,'getmajors']);
// Route::get('/majors/{id}',[SkillController::class,'getmajor']);
Route::get('/schools/{id}',[SchoolController::class,'getschool']);
Route::get('/schools',[SchoolController::class,'getschools']);
Route::get('/schools/address/{name}',[SchoolController::class,'search']);
Route::get('/schools/skill/{name}',[SchoolController::class,'searchSkill']);
Route::post('/schools',[SchoolController::class,'createSchool']);
Route::get('/scholarships/{id}',[ScholarshipController::class,'getScholarship']);
Route::get('/scholarships',[ScholarshipController::class,'scholarships']);
// Route::get('/workshops',[WorkShopController::class,'workshops']);

// Skill route
Route::get('/majors',[SkillController::class,'getSkills']);
Route::get('/majors/{id}',[SkillController::class,'getSkillById']);
Route::post('/majors',[SkillController::class,'createSkill']);
Route::put('/majors/{id}',[SkillController::class,'editeSkill']);
Route::delete('/majors/{id}',[SkillController::class,'deleteSkill']);

// Admin side --------------------------------
Route::get('/users', [AdminController::class, 'index']);
Route::get('/students', [AdminController::class, 'getStudents']);
Route::get('/managers', [AdminController::class, 'getUniversityDirectors']);


// log in and log out
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logOut', [AuthenticationController::class, 'logout']);
});
Route::post('/logIn', [AuthenticationController::class,'login']);

// Create link image from front-end
Route::post('/image',[SkillController::class,'createImageLink']);

// subject route
Route::get('/subjects',[SkillController::class,'getSubjects']);

// Major route
Route::get('/workshops',[WorkShopController::class,'getWorkShops']);
Route::get('/workshops/{id}',[WorkShopController::class,'getWorkShopById']);
Route::post('/workshops',[WorkShopController::class,'createWorkShop']);
Route::put('/workshops/{id}',[WorkShopController::class,'editeWorkShop']);
Route::delete('/workshops/{id}',[WorkShopController::class,'deleteWorkShop']);
Route::patch('/resetPassword',[ResetPasswordController::class,'resetPassword']);
// Route::post('/sendMail',[ResetPasswordController::class,'SendMail'])
Route::post('/sendMail',[ResetPasswordController::class,'SendMail']);

// university page register 
Route::post('/registerMail',[UserController::class,'sendEmail']);


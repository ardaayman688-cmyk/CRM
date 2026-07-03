<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::controller(RegisterController::class)->group(function () {
    Route::post('customer/register', 'register');
    Route::post('customer/login', 'login');
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Protected Routes (Passport)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:api', 'is_admin'])->group(function () {

    // Students
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::post('/students', [StudentController::class, 'createStudent']);
    Route::put('/students/{id}', [StudentController::class, 'updatestudent']);
    Route::patch('/students/{id}', [StudentController::class, 'updatepartial']);
    Route::delete('/students/{id}', [StudentController::class, 'deletestudent']);

    // Courses
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::post('/courses', [CourseController::class, 'creatCourse']);
    Route::put('/courses/{id}', [CourseController::class, 'updateCourse']);
    Route::patch('/courses/{id}', [CourseController::class, 'updatepartial']);
    Route::delete('/courses/{id}', [CourseController::class, 'deleteCourse']);
});

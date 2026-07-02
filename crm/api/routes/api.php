<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;


Route::controller(RegisterController::class)->group(function () {
    Route::post('customer/register', 'register');
    Route::post('customer/login', 'login');
});
Route::get('/students', [StudentController::class, 'index']);

Route::middleware(['auth:api', 'is_admin'])->group(function () {
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::post('/students', [StudentController::class, 'createStudent']);
    Route::put('/students/{id}', [StudentController::class, 'updatestudent']);
    Route::patch('/students/{id}', [StudentController::class, 'updatepartial']);
    Route::delete('/students/{id}', [StudentController::class, 'deletestudent']);
});
Route::controller(CourseController::class)->group(function () {

    Route::get('/courses', 'index');

    Route::middleware(['auth:api', 'is_admin'])->group(function () {
        Route::get('/courses/{id}', 'show');
        Route::post('/courses', 'creatCourse');
        Route::put('/courses/{id}', 'updateCourse');
        Route::patch('/courses/{id}', 'updatepartial');
        Route::delete('/courses/{id}', 'deleteCourse');
    });
});

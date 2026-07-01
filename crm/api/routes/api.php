<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'createStudent']);
Route::put('/students/{id}', [StudentController::class, 'updatestudent']);
Route::patch('/students/{id}', [StudentController::class, 'updatepartial']);
Route::delete('/students/{id}', [StudentController::class, 'deletestudent']);
Route::controller(CourseController::class)->group(function(){
    Route::get('/Course','index');
    Route::get('/Course/{id}','show');
    Route::post('/Course','creatCourse');
    Route::put('/Course/{id}','updateCourse');
    Route::patch('/Course/{id}','updatepartial');
    Route::delete('/Course/{id}','deleteCourse');
    
});



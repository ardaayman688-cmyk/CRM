<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
Route::get('/student', [StudentController::class,'index']);
   
Route::get('/student/{id}', [StudentController::class,'show']);
  
Route::post('/student', [StudentController::class,'creatstudent']);
Route::put('/student/{id}', [StudentController::class,'updatestudent']);
Route::patch('/student/{id}', [StudentController::class,'updatepartial']);
Route::delete('/student/{id}',[StudentController::class,'deletestudent']);
Route::controller(CourseController::class)->group(function(){
    Route::get('/Course','index');
    Route::get('/Course/{$id}','show');
    Route::post('/Course','creatCourse');
    Route::put('/Course/{$id}','updateCourse');
    Route::patch('/Course/{$id}','updatepartial');
    Route::delete('/Course/{$id}','deleteCourse');
    
});



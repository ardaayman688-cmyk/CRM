<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Coursecontroller extends Controller
{
    public function index(){
  
        
          $Course =[
            [
        "id" => 1,
        "name" => 'Backend Development',
        "teacher" => 'Mr.Ahmad',
        "hours"=>'19',
        "age"=>25
    ],
    [
       "id" => 2,
        "name" => 'software Engineering',
        "teacher" => 'Ms.lina',
        "hours"=>'24',
        "age"=>28
    ],
    [
       "id" => 3,
        "name" => 'Frontend Development',
        "teacher" => 'Mr.Omar',
        "hours"=>'30',
        "age"=>27
    ] ];

  return response()->json($Course);
}
public function show($id){
      $Course =[
                  [
        "id" => 1,
        "name" => 'Backend Development',
        "teacher" => 'Mr.Ahmad',
        "hours"=>'19',
        "age"=>25
    ],
    [
       "id" => 2,
        "name" => 'software Engineering',
        "teacher" => 'Ms.lina',
        "hours"=>'24',
        "age"=>28
    ],
    [
       "id" => 3,
        "name" => 'Frontend Development',
        "teacher" => 'Mr.Omar',
        "hours"=>'30',
        "age"=>27
    ] 
       ];
    foreach ($Course as $course) {
        if ($course['id']==$id){
   
return response()->json([$course]);
}}
return response()->json([
    'message' => 'Course not found'
],404);
}
public function creatCourse(Request $request){
     $newCourse =[
        
          "id" => 2,
        "name" => 'software Engineering',
        "teacher" => 'Ms.lina',
        "hours"=>'24',
        "age"=>28
    ];
  
return response()->json([
    'message' => 'Course created successfully',
    'Course' => $newCourse
],201);

}
public function updateCourse(Request $request,$id){
      $updatedCourse =[
        
       "id" => $id,
        "name" => $request->name,
        "teacher" => $request->teacher,
        "hours" => $request->hours,
         "age" => $request->age
    ];
  
return response()->json([
    'message' => 'Course updat successfully',
    'Course' =>  $updatedCourse
],200);
}
public function deleteCourse($id){
    return response()->json([
    'message' => 'Course deleted successfully',
    'course_id' => $id
    
],200);
}
public function updatepartial(Request $request,$id){
    return response()->json([
    'message' => 'Course partially updated successfully',
    'Course_id' =>  $id ,
    'updated_data'=> $request->all()
],200);
}
}
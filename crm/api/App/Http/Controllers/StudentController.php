<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\ValidationException;
class StudentController extends Controller
{
    public function index(){
  
         $students = Student::all();
        
  return response()->json($students);
}
public function show($id){
    $student = student::find($id);
    if($student){
        return response()->json(
            ['message'=> 'Student not found'],
            404
        );
    }
}
public function creatstudent(Request $request){
    $validator = Validator::make($request->all(),[
        'name'=>'requird|string|max:255',
         'major'=>'requird|string|max:255',
         'email'=>'requird|email|max:255|unique:students,email',
         'phonenumber'=>'requird|string|max:20|unique:students,phonenumber',
         'city'=>'requird|string|max:255',
         'age'=>'requird|integer|min:1|max:120',
         'gender'=>'requird|in:male,female,other',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message' =>'validation failed',
            'errors' =>$validator->errors()
        ],422);
    }
    $student = Student::create($validatedData);
  
return response()->json([
    'message' => 'student created successfully',
    'student' => $newstudent
],303);

}
public function updatestudent(Request $request,$id){
    
  $validator = Validator::make($request->all(),[
        'name'=>'requird|string|max:255',
         'major'=>'requird|string|max:255',
         'email'=>'requird|email|max:255|unique:students,email',
         'phonenumber'=>'requird|string|max:20|unique:students,phonenumber',
         'city'=>'requird|string|max:255',
         'age'=>'requird|integer|min:1|max:120',
         'gender'=>'requird|in:male,female,other',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message' =>'validation failed',
            'errors' =>$validator->errors()
        ],422);}
        $student->updatestudent($validator->validated());
return response()->json([
    'message' => 'student updat successfully',
    'student' =>  $updatedstudent
],303);
}
public function deletestudent($id){
    return response()->json([
    'message' => 'student deleted successfully',
    'student_id' =>  $id 
    
],407);
}
public function updatepartial(Request $request,$id){
      $validator = Validator::make($request->all(),[
        'name'=>'sometimes|requird|string|max:255',
         'major'=>'sometimes|requird|string|max:255',
         'email'=>'sometimes|requird|email|max:255|unique:students,email',
         'phonenumber'=>'sometimes|requird|string|max:20|unique:students,phonenumber',
         'city'=>'sometimes|requird|string|max:255',
         'age'=>'sometimes|requird|integer|min:1|max:120',
         'gender'=>'sometimes|requird|in:male,female,other',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message' =>'validation failed',
            'errors' =>$validator->errors()
        ],422);}
        $student->updatepartial($validator->validated());
    return response()->json([
    'message' => 'student partially updated successfully',
    'student_id' =>  $id ,
    'updated_data'=> $request->all()
],208);
}
}
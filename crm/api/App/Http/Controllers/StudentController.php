<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    public function index(){
  
         $students = Student::all();
        
  return response()->json($students);
}
public function show($id){
   $student = Student::find($id);

if (!$student) {
    return response()->json([
        'message' => 'Student not found'
    ],404);
}

return response()->json($student);
}
public function createStudent(Request $request){
    $validator = Validator::make($request->all(),[
        'name'=>'required|string|max:255',
         'major'=>'required|string|max:255',
         'email'=>'required|email|max:255|unique:students,email',
         'phonenumber'=>'required|string|max:20|unique:students,phonenumber',
         'city'=>'required|string|max:255',
         'age'=>'required|integer|min:1|max:120',
         'gender'=>'required|in:male,female,other',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message' =>'validation failed',
            'errors' =>$validator->errors()
        ],422);
    }
    $validatedData = $validator->validated();

$student = Student::create($validatedData);
  
return response()->json([
    'message' => 'student created successfully',
    'student' => $student
],201);

}
public function updatestudent(Request $request,$id){
    
  $validator = Validator::make($request->all(),[
        'name'=>'required|string|max:255',
         'major'=>'required|string|max:255',
         'email' => 'required|email|max:255|unique:students,email,' . $id,
         'phonenumber' => 'required|string|max:20|unique:students,phonenumber,' . $id,
         'city'=>'required|string|max:255',
         'age'=>'required|integer|min:1|max:120',
         'gender'=>'required|in:male,female,other',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message' =>'validation failed',
            'errors' =>$validator->errors()
        ],422);}
 $student = Student::find($id);

if (!$student) {
    return response()->json([
        'message' => 'Student not found'
    ],404);
}

$student->update($validator->validated());

return response()->json([
    'message' => 'Student updated successfully',
    'student' => $student
],200);

}
public function deletestudent($id){
   $student = Student::find($id);

if(!$student){
    return response()->json([
        'message' => 'Student not found'
    ],404);
}

$student->delete();
    return response()->json([
    'message' => 'student deleted successfully',
    'student_id' =>  $id 
    
],200);
}
public function updatepartial(Request $request,$id){
      $validator = Validator::make($request->all(),[
        'name'=>'sometimes|required|string|max:255',
         'major'=>'sometimes|required|string|max:255',
         'email' => 'sometimes|required|email|max:255|unique:students,email,' . $id,
         'phonenumber' => 'sometimes|required|string|max:20|unique:students,phonenumber,' . $id,
         'city'=>'sometimes|required|string|max:255',
         'age'=>'sometimes|required|integer|min:1|max:120',
         'gender'=>'sometimes|required|in:male,female,other',
    ]);
    if ($validator->fails()){
        return response()->json([
            'message' =>'validation failed',
            'errors' =>$validator->errors()
        ],422);}
        $student = Student::find($id);

if(!$student){
    return response()->json([
        'message'=>'Student not found'
    ],404);
}
        $student->update($validator->validated());
    return response()->json([
    'message' => 'student partially updated successfully',
    'student_id' =>  $id ,
    'updated_data'=> $request->all()
],200);

}}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = [
            [
                "id" => 1,
                "name" => 'Backend Development',
                "teacher" => 'Mr.Ahmad',
                "hours" => 19,
                "age" => 25
            ],
            [
                "id" => 2,
                "name" => 'Software Engineering',
                "teacher" => 'Ms.Lina',
                "hours" => 24,
                "age" => 28
            ],
            [
                "id" => 3,
                "name" => 'Frontend Development',
                "teacher" => 'Mr.Omar',
                "hours" => 30,
                "age" => 27
            ]
        ];

        return response()->json($courses);
    }

    public function show($id)
    {
        $courses = $this->getCourses();

        foreach ($courses as $course) {
            if ($course['id'] == $id) {
                return response()->json($course);
            }
        }

        return response()->json([
            'message' => 'Course not found'
        ], 404);
    }

    public function creatCourse(Request $request)
    {
        $newCourse = [
            "id" => 4,
            "name" => $request->name,
            "teacher" => $request->teacher,
            "hours" => $request->hours,
            "age" => $request->age
        ];

        return response()->json([
            'message' => 'Course created successfully',
            'Course' => $newCourse
        ], 201);
    }

    public function updateCourse(Request $request, $id)
    {
        $updatedCourse = [
            "id" => $id,
            "name" => $request->name,
            "teacher" => $request->teacher,
            "hours" => $request->hours,
            "age" => $request->age
        ];

        return response()->json([
            'message' => 'Course updated successfully',
            'Course' => $updatedCourse
        ], 200);
    }

    public function deleteCourse($id)
    {
        return response()->json([
            'message' => 'Course deleted successfully',
            'course_id' => $id
        ], 200);
    }

    public function updatepartial(Request $request, $id)
    {
        return response()->json([
            'message' => 'Course partially updated successfully',
            'Course_id' => $id,
            'updated_data' => $request->all()
        ], 200);
    }

    private function getCourses()
    {
        return [
            [
                "id" => 1,
                "name" => 'Backend Development',
                "teacher" => 'Mr.Ahmad',
                "hours" => 19,
                "age" => 25
            ],
            [
                "id" => 2,
                "name" => 'Software Engineering',
                "teacher" => 'Ms.Lina',
                "hours" => 24,
                "age" => 28
            ],
            [
                "id" => 3,
                "name" => 'Frontend Development',
                "teacher" => 'Mr.Omar',
                "hours" => 30,
                "age" => 27
            ]
        ];
    }
}
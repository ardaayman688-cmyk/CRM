<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('enrollments')->insert([
            [
                'student_id' => 5,
                'course_id' => 1,
                'grade' => 95.5,
            ],
            [
                'student_id' => 1,
                'course_id' => 2,
                'grade' => 88.0,
            ],
            [
                'student_id' => 2,
                'course_id' => 1,
                'grade' => 91.0,
            ],
            [
                'student_id' => 3,
                'course_id' => 3,
                'grade' => 85.5,
            ],
            [
                'student_id' => 4,
                'course_id' => 4,
                'grade' => 97.0,
            ],
        ]);
    }
}
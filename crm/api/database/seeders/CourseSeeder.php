<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                 'id'=>1,
                'name' => 'Laravel Fundamentals',
                'teacher' => 'John Smith',
                'hours' => 40,
                'age' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                 'id'=>2,
                'name' => 'PHP Advanced',
                'teacher' => 'Sarah Johnson',
                'hours' => 35,
                'age' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                 'id'=>3,
                'name' => 'Database Design',
                'teacher' => 'Michael Brown',
                'hours' => 25,
                'age' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                 'id'=>4,
                'name' => 'Web Development',
                'teacher' => 'Emily Davis',
                'hours' => 50,
                'age' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'id'=>1,
                'name' => 'Ahmed Ali',
                'major' => 'Computer Science',
                'email' => 'ahmed@example.com',
                'phonenumber' => 111111111,
                'city' => 'Ramallah',
                'age' => 22,
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>2,
                'name' => 'Sara Khaled',
                'major' => 'Software Engineering',
                'email' => 'sara@example.com',
                'phonenumber' => 222222222,
                'city' => 'Nablus',
                'age' => 21,
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>3,
                'name' => 'Omar Hassan',
                'major' => 'Information Technology',
                'email' => 'omar@example.com',
                'phonenumber' => 333333333,
                'city' => 'Hebron',
                'age' => 23,
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>4,
                'name' => 'Lina Ahmad',
                'major' => 'Data Science',
                'email' => 'lina@example.com',
                'phonenumber' => 444444444,
                'city' => 'Jerusalem',
                'age' => 20,
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>5,
                'name' => 'Yousef Nasser',
                'major' => 'Cyber Security',
                'email' => 'yousef@example.com',
                'phonenumber' => 555555555,
                'city' => 'Bethlehem',
                'age' => 24,
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
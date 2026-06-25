<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
      protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_date',
        'status',
        'grade'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'enrollment_date' => 'date',
        'grade' => 'decimal:2',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}

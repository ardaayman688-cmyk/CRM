<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
      protected $fillable=[
        'name','description','credit_hours','instructor_name'
    ];
    protected $hidden=[
        'created_at','updated_at'
    ];
    protected $casts=[
        'credit_hours'=>'integer'
    ];
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class); 
        
    }
}

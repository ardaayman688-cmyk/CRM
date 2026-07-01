<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
  protected $fillable = [
    'name',
    'major',
    'email',
    'phonenumber',
    'city',
    'age',
    'gender',
];
  protected $casts=[
    'date_of_birth' => 'date',
    'age'=>'integer',
  ];
  protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
  
    
}

           
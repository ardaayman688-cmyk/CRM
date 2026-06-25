<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
  protected $fillable = [
    'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'gender',
        'date_of_birth',
        'age',
        'major',
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

           
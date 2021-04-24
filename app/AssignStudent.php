<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    protected $fillable=[
        'student_id','class_id','year_id','roll'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}

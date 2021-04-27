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

    public function marks(){
        return $this->hasMany(Mark::class,'student_id','student_id');
    }
    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id');
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function totalMark(){
        return $this->hasMany(Mark::class,'student_id','student_id')->SUM('mark');
    }

}

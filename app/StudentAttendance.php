<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable=[
        'student_id','id_card','year_id','class_id','date','attendance',
    ];

    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id');
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }


}

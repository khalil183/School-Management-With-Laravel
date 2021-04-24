<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable=[
    'student_id','id_card','year_id','class_id','subject_id','exam_id','mark'
    ];

    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id');
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function book(){
        return $this->belongsTo(Book::class,'subject_id');
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    protected $fillable=[
        'class_id','book_id','full_mark','pass_mark'
    ];

    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id');
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }

}

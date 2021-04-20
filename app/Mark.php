<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable=[
    'student_id','id_card','year_id','class_id','subject_id','exam_id','mark'
    ];
}

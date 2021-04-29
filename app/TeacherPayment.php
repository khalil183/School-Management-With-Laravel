<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherPayment extends Model
{
    protected $fillable=[
        'teacher_id','month_id','year_id','amount',
    ];
}

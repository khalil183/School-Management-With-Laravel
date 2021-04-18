<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'name','email','student_id','phone','password','father_name','mother_name','gender','address','photo','birth_reg_code','date_of_birth','status'
    ];
}

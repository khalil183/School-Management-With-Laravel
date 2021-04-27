<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeHistory extends Model
{
    protected $fillable=[
    'student_id_card','fee_category_id','month_id','class_id','year_id','amount',
    ];
}

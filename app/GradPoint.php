<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradPoint extends Model
{
    protected $fillable=[
    'start_point','end_point','start_mark','end_mark','grade'
    ];
}

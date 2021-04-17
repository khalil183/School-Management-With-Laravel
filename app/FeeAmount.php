<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    protected $fillable=[
        'fee_category_id','class_id','year_id','amount'
    ];

    public function feeCategory(){
        return $this->belongsTo(FeeCategory::class);
    }
    public function Year(){
        return $this->belongsTo(Year::class);
    }
    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id');
    }


}

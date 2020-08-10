<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassTimeTable extends Model
{
    protected $fillable = [
        'class_id',
         'year',
         'subject_id',
         'period_no',
         'Room_no',
    ];

}

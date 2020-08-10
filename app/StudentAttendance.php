<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    // protected $primaryKey = ['student_id','date'];
    protected $fillable = [
        'student_id',
        'date',
        'roll_no',
        'class_id',
        'teacher_id',
        'status',
        'remarks',
    ];
}

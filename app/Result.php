<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $primaryKey = ['id'];
    protected $table ="results";
      protected $fillable = [
        'subject_id',
        'year',
        'student_id',
        'exam',
        'marks',
        'obtain_marks',
        'status_report',
         'promoted',
         'class_id',
      
   ];
}

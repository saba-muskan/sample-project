<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    protected $fillable = [
        'subject_id',
        'year',
        'student_id',
        'marks',
        'obtain_marks',
        'promoted'
        
    ];
}

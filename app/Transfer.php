<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id' ,
        'trasfer_Reqdate' ,
        'Reason',
        'From_Campus' ,
        'To_Campus' ,
        'trasfer_date' ,

    ];
}

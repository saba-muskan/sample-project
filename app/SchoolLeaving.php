<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolLeaving extends Model
{ protected $primaryKey = 'id';
    protected $fillable = [
        'student_id' ,
        'Date' ,
        'Certificate',
       

    ];
}

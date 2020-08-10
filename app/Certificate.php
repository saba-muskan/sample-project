<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table ="certificate";
    protected $primaryKey ='Certificate_id';

    protected $fillable = [
        'parent_id',
        'student_id',
        'Description',
        'tution_fee',
        'date',
        'status',
     
    ];
}

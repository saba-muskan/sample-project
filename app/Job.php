<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
    protected $connection = 'mysql';
    protected $primaryKey = 'job_id';
    protected $table = 'jobs';
    protected $fillable = [
        'job_Name',
        'dept_id',
       
    ];
}

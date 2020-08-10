<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee1 extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'employee';
    protected $fillable = array(
        'Ename',
        'job',
        'salary'
    );

    public $timestamps = true;
  

}

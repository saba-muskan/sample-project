<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $connection = 'mysql';
    protected $primaryKey = 'Area_id';
    protected $table = 'area';
    protected $fillable = [
        'name',
        'city_id',
        
    ];
 
}

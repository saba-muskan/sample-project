<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{


    protected $connection = 'mysql';
    protected $primaryKey = 'city_id';
    protected $table = 'city';
    protected $fillable = [
        'city_name',
       
    ];
}

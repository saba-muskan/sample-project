<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{ protected $connection = 'mysql';
    protected $primaryKey = 'branch_id';
    protected $table = 'branch';
    protected $fillable = array(
        'branch_name',
        'address',
        'tel-no',
        'area_id',
    );
}

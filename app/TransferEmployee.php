<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferEmployee extends Model
{
    
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id' ,
        'transfer_Reqdate' ,
        'Reason',
        'From_Campus' ,
        'To_Campus' ,
        'transfer_date' ,

    ];
}

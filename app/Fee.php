<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Fee extends Model
{
    protected $table ="fees";
    protected $primaryKey ='fee_id';


    protected $fillable = [
        'class_id',
        'annual_charges',
        'lab',
        'tution_fee',
        'year',
        'amount',
        'branch_id',
        'late_charges',
        'fee_type',
        'month',
        'feeGenerationDate',
        'due_date',
    ];
}

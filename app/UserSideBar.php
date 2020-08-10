<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSideBar extends Model
{
    protected $fillable = [
        'sidebar_id',
        'user_id',
       
    ];
}

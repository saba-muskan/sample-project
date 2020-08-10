<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SideBar extends Model
{
    protected $table="sidebar";
     protected $fillable = [
        'Name',
        'SideBarMenu'
        
    ];
}

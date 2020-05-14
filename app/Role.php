<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable=[
    	'name', 'slug','permissions',
    ];

    protected $casts=[
    	'permissions' => 'array',
    ];

    

    

}

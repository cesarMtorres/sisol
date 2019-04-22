<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Configuracion extends Model
{
	use SoftDeletes;
    //
    protected $dates=['deleted_at'];
    protected $table="configuracion";
    protected $fillable=[
    	"nombre",
    	"logo",
    ];
}

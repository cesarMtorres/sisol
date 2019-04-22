<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{
    //
    use SoftDeletes;


    protected $dates=['deleted_at'];
    protected $table="especialidad";

    protected $fillable=["nombre"];

	public function agremiados(){

    	return $this->belongsToMany('App\Agremiado');

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Plano extends Model
{
    //
    protected $table="plano";

    protected $fillable=['nproyecto','fecha','fecham','status','agremd_id'];


    public function agremiados(){

    	return $this->belognToMany('App\Agreamiado');

    }
     public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

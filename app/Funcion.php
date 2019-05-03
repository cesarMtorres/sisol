<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    //
    protected $table="funcion";
    protected $fillable=['nombre','nivel','status'];
    protected $dates=["deleted_at"];


    public function perfiles(){
 		return $this->belongsToMany('App\Perfil','funcion_perfil','funcion_id','perfil_id')->withPivot('function_id','perfil_id');
    }

    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

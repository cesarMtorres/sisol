<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Perfil extends Model
{
    //
    protected $table="perfil";
    protected $fillable=['nombre','nivel','status'];
    protected $dates=['deleted_at'];


    public function perfiles(){
 		return $this->belongsToMany('App\function','funcion_perfil','funcion_id','perfil_id')->withPivot('function_id','perfil_id');
    }


    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

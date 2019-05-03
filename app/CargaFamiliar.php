<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    //

    protected $table="carga_familiar";
    protected $fillable=['fecha_nac','agremiado_id'];
    protected $dates=['deleted_at'];


    public function agremiados(){
    	return $this->belongsToMany('App\Agremiado','agremiado_cfamiliar','agremiado_id','cargar_familiar_id')->withPivot('agremiado_id','cargar_familiar_id');
    }

    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstrumentoClasificacion extends Model
{
    //
    protected $table="instrumento_clasificacion";
    protected $dates=['daleted_at'];
    protected $fillable=["nombre"];


    public function instrumento(){
    	$this->belongsTo('App\Instrumento');
    }


     public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

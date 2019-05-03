<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Instrumento extends Model
{
    //
    use SoftDeletes;
    protected $table="instrumento";
    protected $dates=['daleted_at'];
    protected $fillable=["nombre","descripcion","clasificacion_id"];

    public function instrumentoclasificion(){
    	$this->hasMany('App\InstrumentoClasificacion');
    }


    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proyecto extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $table="proyecto";

    protected $fillable=["nombre","tipo_proyecto_id","instituto_id"];

    
    public function agremiados(){
    	return $this->belongtoMany('App\Agremiado','agremiado_proyecto');
    }


     public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

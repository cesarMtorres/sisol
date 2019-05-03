<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tarifa extends Model
{
    //
    use SoftDeletes;
    
    protected $table="tarifa";
    protected $fillable=["nombre","monto","fecha_ini","fecha_fin"];
    protected $dates=["deleted_at"];

    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TipoProyecto extends Model
{
    //
    use SoftDeletes;
    protected $table="tipo_proyecto";
    protected $dates=['deleted_at'];
    protected $fillable=["nombre","tipo_proyecto_id",'instituto_id'];


    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

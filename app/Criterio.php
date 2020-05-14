<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Criterio extends Model
{
    use SoftDeletes;


    protected $dates=['deleted_at'];
    protected $table="criterio";

    protected $fillable=["nombre","consulta","users_id"];


     public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }

}

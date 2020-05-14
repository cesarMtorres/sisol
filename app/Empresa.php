<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    //
    use SoftDeletes;
    protected $dates=["deleted_at"];
    protected $table="empresa";
    protected $fillable=["nombre"];

    

   public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaremoClasi extends Model
{
    //
    protected $table="instrumento_clasificacion";
    protected $fillable=['nombre'];
    protected $dates=['deleted_at'];

        public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

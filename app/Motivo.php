<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Motivo extends Model
{
    //
    use SoftDeletes;
    protected $table="motivo";
    protected $dates=['deleted_at'];
    protected $fillable=["nombre"];


    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

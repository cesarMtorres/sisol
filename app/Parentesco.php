<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Parentesco extends Model
{
    //
    use SoftDeletes;
    protected $table="parentesco";
    protected $fillable=["nombre"];
    protected $dates=['deleted_at'];


    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

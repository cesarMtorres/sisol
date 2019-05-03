<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Auditoria extends Model
{
    //
     use SoftDeletes; 
    protected $dates=['deleted_at'];
    protected $table="auditoria";
    //protected $primaryKey="agrem_id";
    protected $fillable=["codigo","status","transaccion_id","agremiado_id","observacion","plano"];

    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
   }
}

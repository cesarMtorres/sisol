<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Persona extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $table="persona";
    //protected $primaryKey="agrem_id";
    protected $fillable=["cedula","nombre","apellido","direccion","telefono","fecha_nacimiento"];

        

        public function agremiados(){

        return $this->belongsToMany(Agramiado::class,'agremiado_persona');

    }


    public function scopeSearch($query,$nombre){
   	return $query->where('nombre','LIKE',"%$nombre%");
     }


}


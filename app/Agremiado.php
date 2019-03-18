<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agremiado extends Model
{
    //
        use SoftDeletes; 
    protected $dates=['delete_at'];
    //protected $primaryKey="agrem_id";
    protected $fillable=["civ","nombre","direccion","especialidad","codigo","trabajo","cedula","solvencia","carga","telefono","universidad","estado"];

    public  function especialidad(){
    	 return $this->belongsTo('Curso\Especialidad');
    }
    public function CargaFamiliares(){

    	return $this->hasMany('Curso\CargaFamiliar');
    }
}

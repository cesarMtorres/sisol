<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agremiado extends Model
{
    //
        use SoftDeletes; 
    protected $dates=['deleted_at'];
    protected $table="agremiado";
    //protected $primaryKey="agrem_id";
    protected $fillable=["civ","saldo","trabajo","status","solvencia","parroquia_id","universidad_id"];


    
    public function personas(){

        return $this->belongsToMany('App\Persona','agremiado_persona')
        ->withPivot('persona_id');
    }

    public  function especialidades(){
    	 return $this->belongsToMany('App\Especialidad');
    }
    public function CargaFamiliares(){

    	return $this->hasMany('App\CargaFamiliar');
    }


    public function planos(){
        return $this->belongsToMany('App\Planos');
    }

    
}

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

        return $this->belongsToMany('App\Persona','agremiado_persona','agremiado_id','persona_id')->withPivot('agremiado_id','persona_id');
    }

    public  function especialidades(){
    	 return $this->belongsToMany('App\Especialidad','agremiado_especialidad','agremiado_id','especialidad_id')->withPivot('agremiado_id','especialidad_id');
    }
    public function cargaFamiliares(){

    	return $this->hasMany('App\CargaFamiliar');
    }


    public function planos(){
        return $this->belongsToMany('App\Planos');
    }

    public function proyectos(){
        return $this->belongsToMany('App\Proyecto');
    }

    public function scopeSearch($query,$civ){
    return $query->where('civ','LIKE',"%$civ%");
   }
}

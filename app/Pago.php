<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pago extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $table="pago";
    protected $fillable=[
    	'fecha',
    	'nombre',
    	'monto',
    	'tipo_pago_id',
    	'transaccion_id',
    	'agremiado_id'
    ];
}

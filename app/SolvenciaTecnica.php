<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SolvenciaTecnica extends Model
{
    //

    use SoftDeletes;
    protected $dates=["deleted_at"];
     protected $table="solvencia_tecnica"; // NOMBRE TABLA
    
    protected $fillable=["agremiado_id","tipo_certificado","monto","medida","descripcion","banco_id","referencia","tipo_pago_id","cepir_id","visado_id"];

    
}

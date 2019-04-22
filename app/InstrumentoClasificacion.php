<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstrumentoClasificacion extends Model
{
    //
        protected $table="instrumento_clasificacion";
    protected $dates=['daleted_at'];
    protected $fillable=["nombre"];
}

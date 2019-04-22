<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TipoPago extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $table="tipo_pago";
    protected $fillable=['nombre'];
}

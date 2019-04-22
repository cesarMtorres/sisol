<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proyecto extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $table="proyecto";

    protected $fillable=["nombre","tipo_proyecto_id","num_revision"];
}

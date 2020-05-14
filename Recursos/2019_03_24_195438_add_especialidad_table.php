<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->timestamps();
        });

// crea tabla puente y agrega las relaciones
        Schema::create('agremiado_especialidad'function(Blueprint $table){
            $table->increments('id');
            $table->integer('agremiado_id')->unsigned();
            $table->integer('especialidad_id')->unsigned();

            $table->foreign('agremiado_id')->references('id')->on('agremiado');
            $table->foreign('especialidad_id')->references('id')->on('especialidad');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidad');
    }
}

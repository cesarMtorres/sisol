<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableAgremiado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agremiado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo',10);
            $table->integer('civ');
            $table->integer('status');
            $table->float('saldo');
            $table->string('trabajo',50);
            $table->integer('especialidad_id');
            $table->integer('universidad_id');
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
        Schema::dropIfExists('agremiado');
    }
}

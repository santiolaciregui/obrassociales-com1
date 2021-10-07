<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Familiares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('estado_civil');
            $table->integer('cliente_id');
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
         Schema::dropIfExists('familiares');
    }
}

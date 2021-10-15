<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('estado_civil');
            $table->string('empresa')->nullable();
            $table->bigInteger('cuil')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('plan_id');
            $table->integer('id_titular');
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('plan_id')->references('id')->on('plan');
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
        Schema::dropIfExists('cliente');
    }
}

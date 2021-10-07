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
            $table->string('empresa');
            $table->bigInteger('cuil');
            $table->bigInteger('telefono');
            $table->string('email')->unique();
            $table->integer('plan_id');
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->integer('familiar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('plan_id')->references('id')->on('plan');
            $table->foreign('familiar')->references('id')->on('familiares');
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

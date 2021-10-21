<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reintegro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reintegros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente');
            $table->date('fecha_solicitud');
            $table->bigInteger('comprobante_factura');
            $table->date('fecha_emision');
            $table->string('nombre_profesional');
            $table->integer('importe_facturado');
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
        Schema::dropIfExists('reintegros');
    }
}

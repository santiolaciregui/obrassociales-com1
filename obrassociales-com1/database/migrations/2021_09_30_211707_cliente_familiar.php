<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('familiares', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('cliente');
        });

        Schema::table('plan', function (Blueprint $table) {
            $table->foreign('clientes')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

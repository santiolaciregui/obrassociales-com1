<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanPrestacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_prestacion', function (Blueprint $table) {
            $table->integer('plan_id');
            $table->integer('prestacion_id');
            $table->foreign('plan_id')->references('id')->on('plan');
            $table->foreign('prestacion_id')->references('id')->on('prestacion');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_prestacion');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contables', function (Blueprint $table) {
            $table->foreign('banca_id')->references('id')->on('bancas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('concepto_id')->references('id')->on('conceptos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contables', function (Blueprint $table) {
            //
        });
    }
}

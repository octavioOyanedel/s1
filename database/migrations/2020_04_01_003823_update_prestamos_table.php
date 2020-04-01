<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {        
            $table->foreign('banca_id')->references('id')->on('bancas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('metodo_id')->references('id')->on('metodos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('renta_id')->references('id')->on('rentas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('prestamos', function (Blueprint $table) {
            //
        });
    }
}

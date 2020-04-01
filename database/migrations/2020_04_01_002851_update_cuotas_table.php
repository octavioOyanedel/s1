<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     * se podrá eliminar o actualizar una fila cuota ssi no existe  préstamo, lo mismo para estado
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuotas', function (Blueprint $table) {            
            $table->foreign('prestamo_id')->references('id')->on('prestamos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('restrict');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            //
        });
    }
}

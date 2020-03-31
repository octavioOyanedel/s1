<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->increments('id'); 
            $table->date('fecha');
            $table->unsignedInteger('registro');
            $table->unsignedInteger('banca_id');
            $table->string('cheque');
            $table->unsignedInteger('monto');
            $table->unsignedInteger('cuotas')->nullable();
            $table->unsignedInteger('metodo_id');
            $table->unsignedInteger('renta_id');
            $table->unsignedInteger('estado_id');
            $table->date('fecha_pago')->nullable();
            $table->unsignedInteger('tipo_id');
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
        Schema::dropIfExists('prestamos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contables', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->increments('id');
            $table->date('fecha');
            $table->unsignedInteger('banca_id'); //restrict          
            $table->unsignedInteger('concepto_id'); //restrict
            $table->unsignedInteger('user_id'); //restrict
            $table->unsignedInteger('monto');
            $table->unsignedInteger('registro');
            $table->unsignedInteger('tipo_id'); //restrict
            $table->string('cheque');
            $table->string('detalle');
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
        Schema::dropIfExists('contables');
    }
}

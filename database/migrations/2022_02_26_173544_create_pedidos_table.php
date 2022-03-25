<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('codigo');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_unidade');
            $table->dateTime('data');
            $table->string('referencia');
            $table->timestamps();
            $table->foreign('id_cliente')->references('codigo')->on('clientes');
            $table->foreign('id_unidade')->references('codigo')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};

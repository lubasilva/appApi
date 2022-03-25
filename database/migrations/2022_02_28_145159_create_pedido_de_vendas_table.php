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
        Schema::create('pedido_de_vendas', function (Blueprint $table) {
            $table->id('codigo');
            $table->unsignedBigInteger('id_pedido');
            $table->timestamps();
            $table->foreign('id_pedido')->references('codigo')->on('pedidos');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_de_vendas');
    }
};

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
            $table->id();
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_unidade');
            $table->unsignedBigInteger('id_produto');
            $table->timestamps();
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_unidade')->references('id')->on('unidades');
            $table->foreign('id_produto')->references('id')->on('produtos');
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

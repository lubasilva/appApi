<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PedidoDeVenda>
 */
class PedidoDeVendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_pedido' => Pedido::factory()->create()->id,
            'id_cliente' => Cliente::factory()->create()->id,
            'id_unidade' => Unidade::factory()->create()->id,
            'id_produto' => Produto::factory()->create()->id,
        ];
    }
}

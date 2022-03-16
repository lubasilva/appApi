<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;
use App\Models\Unidade;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_cliente' => Cliente::factory()->create()->codigo,
            'id_unidade' => Unidade::factory()->create()->codigo,
            'data' => $this->faker->date(),
            'referencia' => $this->faker->unique->name(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PedidoPorProduto>
 */
class PedidoPorProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            return [
                'id_pedido' => 1,
                'id_produto' => $this->faker->unique()->randomDigit
            ];
        ];
    }
}

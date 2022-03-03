<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sequencia' => $this->faker->unique->randomNumber(),
            'nome' => $this->faker->name(),
            'qtdvendida' => $this->faker->randomDigit(),
            'qtdentregue' => $this->faker->randomDigit(),
            'campo1' => 'campo1',
            'campo2' => 'campo2',
            'campo3' => 'campo3',
        ];
    }
}

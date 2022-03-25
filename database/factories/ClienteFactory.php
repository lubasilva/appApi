<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tipo = null;
        return [
            'nome' => $this->faker->name(),
            'cnpj' => $tipo = rand(0,1) ? $this->faker->numerify('###########') : $this->faker->numerify('##############'),
            'email' => $this->faker->email(),
            'tipo' => $tipo ? 'F' : 'J',
            'municipio' => $this->faker->city(),
        ];
    }
}

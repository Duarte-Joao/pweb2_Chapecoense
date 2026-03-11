<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jogador>
 */
class JogadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'posicao' => fake()->randomElement(['Goleiro', 'Zagueiro', 'Lateral', 'Meio-Campo', 'Volante', 'Ponta', 'Atacante']),
            'numero_camisa' => fake()-> numberBetween(1,99),
            'data_nascimento' => fake()->date(),
            'nacionalidade' => fake()->country(),
        ];
    }
}

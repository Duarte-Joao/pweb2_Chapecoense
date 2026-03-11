<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Socio>
 */
class SocioFactory extends Factory
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
            'cpf' => fake()->unique()->numerify('###########'),
            'email' => fake()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'categoria_socio' => fake()->randomElement(['Geral','Cadeira Lateral', 'Cadeira Central']),
            'data_associacao' => fake()->date(),
        ];
    }
}

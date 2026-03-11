<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partida>
 */
class PartidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adversario' => fake()->company(),
            'data_partida' => fake()->date(),
            'estadio' => fake()->city(),
            'competicao' => fake()->randomElement(['Brasileirão','Copa do Brasil','Catarinense']),
            'gols_chapecoense' => fake()->numberBetween(0,5),
            'gols_adversario' => fake()->numberBetween(0,5),
        ];
    }
}

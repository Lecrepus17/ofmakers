<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<>
 */
class DadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temperatura' => $this->faker->randomFloat(1, -10, 30),
            'umidade' => $this->faker->numberBetween( 1, 100),
            'tempo' => $this->faker->dateTimeBetween('-90 days', 'now'),
        ];
    }
}

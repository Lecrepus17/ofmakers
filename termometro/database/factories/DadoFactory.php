<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DadooFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temperatura' => $this->faker->randomFloat(1, 1, 50),
            'umidade' => $this->faker->randomNumber( 1, 100),
            'tempo' => $this->faker->dateTime,
        ];
    }
}

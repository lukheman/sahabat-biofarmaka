<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gejala>
 */
class GejalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'kode' => $this->faker->unique()->regexify('G[0-9]{3}'),
            'nama' => $this->faker->words(2, true),
        ];
    }
}

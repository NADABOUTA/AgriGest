<?php

namespace Database\Factories;

use App\Models\Parcelle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->unique()->city().' (Parcelle '.fake()->numberBetween(1, 30).')',
            'culture' => fake()->randomElement(['maïs', 'blé', 'vigne', 'riz', 'tomates', 'tournesol']),
            'superficie' => fake()->randomFloat(2, 0.5, 50),
            'date_plantation' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'statut' => fake()->randomElement(['en culture', 'récoltée', 'en jachère']),
        ];
    }
}

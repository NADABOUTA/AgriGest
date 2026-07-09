<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Définit l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cultures = ['Blé', 'Maïs', 'Orge', 'Olivier', 'Tomate', 'Pomme de terre', 'Vigne', 'Luzerne'];

        return [
            'nom'             => 'Parcelle ' . $this->faker->unique()->numberBetween(1, 500) . ' - ' . $this->faker->lastName(),
            'culture'         => $this->faker->randomElement($cultures),
            'superficie'      => $this->faker->randomFloat(2, 0.5, 25),
            'date_plantation' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'statut'          => $this->faker->randomElement(['en_culture', 'en_jachere', 'recoltee']),
        ];
    }
}

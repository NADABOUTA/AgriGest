<?php

namespace Database\Seeders;

use App\Models\Parcelle;
use Illuminate\Database\Seeder;

class ParcelleSeeder extends Seeder
{
    /**
     * Exécute le seeder : génère 20 parcelles fictives.
     */
    public function run(): void
    {
        Parcelle::factory()->count(20)->create();
    }
}

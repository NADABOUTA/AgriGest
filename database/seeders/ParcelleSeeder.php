<?php

namespace Database\Seeders;

use App\Models\Parcelle;
use Illuminate\Database\Seeder;

class ParcelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Parcelle::factory()->count(20)->create();
    }
}

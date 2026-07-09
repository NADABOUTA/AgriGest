<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration : création de la table "parcelles".
     */
    public function up(): void
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');                     // Nom de la parcelle
            $table->string('culture');                 // Type de culture (blé, maïs, olivier...)
            $table->decimal('superficie', 8, 2);        // Superficie en hectares
            $table->date('date_plantation');            // Date de plantation
            $table->enum('statut', ['en_culture', 'en_jachere', 'recoltee'])
                  ->default('en_culture');              // Statut de la parcelle
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};

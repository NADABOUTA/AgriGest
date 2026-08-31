<?php

namespace Tests\Feature;

use App\Models\Parcelle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParcelleFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_la_liste_affiche_le_champ_de_recherche_et_le_menu_de_statut(): void
    {
        $response = $this->get(route('parcelles.index'));

        $response->assertStatus(200);
        $response->assertSee('Rechercher par nom ou culture');
        $response->assertSee('Tous');
        $response->assertSee('en culture');
        $response->assertSee('récoltée');
        $response->assertSee('en jachère');
    }

    public function test_la_recherche_filtre_par_nom(): void
    {
        $trouvee = Parcelle::factory()->create(['nom' => 'Champ du maïs', 'culture' => 'maïs']);
        $autre = Parcelle::factory()->create(['nom' => 'Parcelle Nord', 'culture' => 'blé']);

        $response = $this->get(route('parcelles.index', ['q' => 'maïs']));

        $response->assertOk();
        $response->assertSee($trouvee->nom);
        $response->assertDontSee($autre->nom);
    }

    public function test_la_recherche_filtre_par_culture(): void
    {
        $trouvee = Parcelle::factory()->create(['culture' => 'vigne']);
        $autre = Parcelle::factory()->create(['culture' => 'blé']);

        $response = $this->get(route('parcelles.index', ['q' => 'vigne']));

        $response->assertOk();
        $response->assertSee($trouvee->nom);
        $response->assertDontSee($autre->nom);
    }

    public function test_la_recherche_est_insensible_a_la_casse(): void
    {
        $trouvee = Parcelle::factory()->create(['culture' => 'vigne']);
        $autre = Parcelle::factory()->create(['culture' => 'riz']);

        $response = $this->get(route('parcelles.index', ['q' => 'VIGNE']));

        $response->assertOk();
        $response->assertSee($trouvee->nom);
        $response->assertDontSee($autre->nom);
    }

    public function test_le_filtre_par_statut(): void
    {
        $recottee = Parcelle::factory()->create(['statut' => 'récoltée']);
        $enCulture = Parcelle::factory()->create(['statut' => 'en culture']);

        $response = $this->get(route('parcelles.index', ['statut' => 'récoltée']));

        $response->assertOk();
        $response->assertSee($recottee->nom);
        $response->assertDontSee($enCulture->nom);
    }

    public function test_la_recherche_et_le_filtre_fonctionnent_ensemble(): void
    {
        $trouvee = Parcelle::factory()->create(['culture' => 'maïs', 'statut' => 'récoltée']);
        $autre = Parcelle::factory()->create(['culture' => 'maïs', 'statut' => 'en culture']);

        $response = $this->get(route('parcelles.index', ['q' => 'maïs', 'statut' => 'récoltée']));

        $response->assertOk();
        $response->assertSee($trouvee->nom);
        $response->assertDontSee($autre->nom);
    }

    public function test_les_criteres_sont_conserves_dans_l_url(): void
    {
        Parcelle::factory()->create(['culture' => 'maïs', 'statut' => 'récoltée']);

        $response = $this->get('/parcelles?q=ma%C3%AFs&statut=r%C3%A9colt%C3%A9e');

        $response->assertOk();
        $response->assertSee('value="maïs"', false);
        $response->assertSee('<option value="récoltée" selected', false);
    }

    public function test_un_statut_invalide_est_ignore_sans_erreur(): void
    {
        $parcelle = Parcelle::factory()->create(['statut' => 'en culture']);

        $response = $this->get(route('parcelles.index', ['statut' => 'inconnu']));

        $response->assertOk();
        $response->assertSee($parcelle->nom);
    }

    public function test_sans_resultat_affiche_aucune_parcelle_trouvee(): void
    {
        Parcelle::factory()->create(['culture' => 'vigne']);

        $response = $this->get(route('parcelles.index', ['q' => 'blé']));

        $response->assertOk();
        $response->assertSee('Aucune parcelle trouvée');
    }

    public function test_le_bouton_reinitialiser_retourne_a_la_liste_complete(): void
    {
        Parcelle::factory()->create();

        $response = $this->get(route('parcelles.index', ['q' => 'blé']));

        $response->assertOk();
        $response->assertSee(route('parcelles.index'));
    }
}

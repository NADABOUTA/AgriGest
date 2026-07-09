<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParcelleRequest extends FormRequest
{
    /**
     * Autorise tout le monde à effectuer cette requête (pas d'auth pour l'instant).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation appliquées au formulaire d'ajout.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nom'             => ['required', 'string', 'max:255'],
            'culture'         => ['required', 'string', 'max:255'],
            'superficie'      => ['required', 'numeric', 'min:0.01'],
            'date_plantation' => ['required', 'date'],
            'statut'          => ['required', 'in:en_culture,en_jachere,recoltee'],
        ];
    }

    /**
     * Messages d'erreur personnalisés en français.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom.required'             => "Le nom de la parcelle est obligatoire.",
            'culture.required'         => "Veuillez indiquer le type de culture.",
            'superficie.required'      => "La superficie est obligatoire.",
            'superficie.numeric'       => "La superficie doit être un nombre.",
            'superficie.min'           => "La superficie doit être supérieure à 0.",
            'date_plantation.required' => "La date de plantation est obligatoire.",
            'date_plantation.date'     => "La date de plantation n'est pas valide.",
            'statut.required'          => "Le statut est obligatoire.",
            'statut.in'                => "Le statut sélectionné n'est pas valide.",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParcelleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'culture' => ['required', 'string', 'max:255'],
            'superficie' => ['required', 'numeric', 'min:0.01'],
            'date_plantation' => ['required', 'date'],
            'statut' => ['required', 'in:en culture,récoltée,en jachère'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de la parcelle est obligatoire.',
            'culture.required' => 'La culture est obligatoire.',
            'superficie.required' => 'La superficie est obligatoire.',
            'superficie.numeric' => 'La superficie doit être un nombre.',
            'superficie.min' => 'La superficie doit être supérieure à 0.',
            'date_plantation.required' => 'La date de plantation est obligatoire.',
            'date_plantation.date' => 'La date de plantation est invalide.',
            'statut.required' => 'Le statut est obligatoire.',
            'statut.in' => 'Le statut doit être « en culture », « récoltée » ou « en jachère ».',
        ];
    }
}
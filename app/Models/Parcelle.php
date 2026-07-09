<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'culture',
        'superficie',
        'date_plantation',
        'statut',
    ];

    /**
     * Cast automatique des types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'superficie'      => 'decimal:2',
        'date_plantation' => 'date',
    ];

    /**
     * Libellés lisibles pour les statuts (utile dans les vues).
     */
    public static function statuts(): array
    {
        return [
            'en_culture' => 'En culture',
            'en_jachere' => 'En jachère',
            'recoltee'   => 'Récoltée',
        ];
    }

    /**
     * Accesseur pratique pour afficher le statut en français.
     */
    public function getStatutLibelleAttribute(): string
    {
        return self::statuts()[$this->statut] ?? $this->statut;
    }
}

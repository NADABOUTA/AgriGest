<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'culture',
        'superficie',
        'date_plantation',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'superficie' => 'float',
            'date_plantation' => 'date',
        ];
    }
}

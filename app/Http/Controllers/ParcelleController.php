<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParcelleRequest;
use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
    public function index(Request $request)
    {
        $statutsAutorises = ['en culture', 'récoltée', 'en jachère'];
        $q = trim((string) $request->query('q'));
        $statut = $request->query('statut');

        $parcelles = Parcelle::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($query) use ($q) {
                    $query->where('nom', 'like', "%{$q}%")
                        ->orWhere('culture', 'like', "%{$q}%");
                });
            })
            ->when(in_array($statut, $statutsAutorises, true), function ($query) use ($statut) {
                $query->where('statut', $statut);
            })
            ->orderBy('nom')
            ->get();

        return view('parcelles.index', [
            'parcelles' => $parcelles,
            'q' => $q,
            'statut' => in_array($statut, $statutsAutorises, true) ? $statut : '',
        ]);
    }

    public function create()
    {
        return view('parcelles.create');
    }

    public function store(StoreParcelleRequest $request)
    {
        Parcelle::create($request->validated());

        return redirect()
            ->route('parcelles.index')
            ->with('success', 'Parcelle ajoutée avec succès.');
    }

    public function destroy(Parcelle $parcelle)
    {
        $parcelle->delete();

        return redirect()
            ->route('parcelles.index')
            ->with('success', 'Parcelle supprimée avec succès.');
    }
}

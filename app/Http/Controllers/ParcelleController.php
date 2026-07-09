<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParcelleRequest;
use App\Http\Requests\UpdateParcelleRequest;
use App\Models\Parcelle;

class ParcelleController extends Controller
{
    /**
     * US5 — Affiche la liste de toutes les parcelles.
     */
    public function index()
    {
        $parcelles = Parcelle::latest()->paginate(10);

        return view('parcelles.index', compact('parcelles'));
    }

    /**
     * US2 — Affiche le formulaire d'ajout d'une parcelle.
     */
    public function create()
    {
        $statuts = Parcelle::statuts();

        return view('parcelles.create', compact('statuts'));
    }

    /**
     * US2 — Enregistre une nouvelle parcelle en base.
     */
    public function store(StoreParcelleRequest $request)
    {
        Parcelle::create($request->validated());

        return redirect()
            ->route('parcelles.index')
            ->with('success', 'La parcelle a été ajoutée avec succès.');
    }

    /**
     * US1 — Affiche la fiche détaillée d'une parcelle.
     */
    public function show(Parcelle $parcelle)
    {
        return view('parcelles.show', compact('parcelle'));
    }

    /**
     * US3 — Affiche le formulaire de modification d'une parcelle.
     */
    public function edit(Parcelle $parcelle)
    {
        $statuts = Parcelle::statuts();

        return view('parcelles.edit', compact('parcelle', 'statuts'));
    }

    /**
     * US3 — Met à jour une parcelle existante.
     */
    public function update(UpdateParcelleRequest $request, Parcelle $parcelle)
    {
        $parcelle->update($request->validated());

        return redirect()
            ->route('parcelles.index')
            ->with('success', 'La parcelle a été modifiée avec succès.');
    }

    /**
     * US4 — Supprime une parcelle.
     */
    public function destroy(Parcelle $parcelle)
    {
        $parcelle->delete();

        return redirect()
            ->route('parcelles.index')
            ->with('success', 'La parcelle a été supprimée avec succès.');
    }
}

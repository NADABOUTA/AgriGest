@extends('layouts.app')

@section('title', 'Liste des parcelles')

@section('content')
    <div class="card">
        <div class="toolbar">
            <h2>Liste des parcelles</h2>
            <a href="{{ route('parcelles.create') }}" class="btn btn-primary">+ Ajouter une parcelle</a>
        </div>

        @if ($parcelles->isEmpty())
            <p>Aucune parcelle enregistrée pour le moment.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Culture</th>
                        <th>Superficie (ha)</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parcelles as $parcelle)
                        <tr>
                            <td>
                                <a href="{{ route('parcelles.show', $parcelle) }}">{{ $parcelle->nom }}</a>
                            </td>
                            <td>{{ $parcelle->culture }}</td>
                            <td>{{ number_format($parcelle->superficie, 2) }}</td>
                            <td>
                                <span class="badge badge-{{ $parcelle->statut }}">
                                    {{ $parcelle->statut_libelle }}
                                </span>
                            </td>
                            <td class="actions">
                                <a href="{{ route('parcelles.show', $parcelle) }}" class="btn btn-secondary">Voir</a>
                                <a href="{{ route('parcelles.edit', $parcelle) }}" class="btn btn-secondary">Modifier</a>
                                <form action="{{ route('parcelles.destroy', $parcelle) }}" method="POST"
                                      onsubmit="return confirm('Supprimer définitivement cette parcelle ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 1rem;">
                {{ $parcelles->links() }}
            </div>
        @endif
    </div>
@endsection

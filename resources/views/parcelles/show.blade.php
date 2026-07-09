@extends('layouts.app')

@section('title', 'Fiche parcelle - ' . $parcelle->nom)

@section('content')
    <div class="card">
        <div class="toolbar">
            <h2>{{ $parcelle->nom }}</h2>
            <span class="badge badge-{{ $parcelle->statut }}">{{ $parcelle->statut_libelle }}</span>
        </div>

        <table>
            <tbody>
                <tr>
                    <th>Culture</th>
                    <td>{{ $parcelle->culture }}</td>
                </tr>
                <tr>
                    <th>Superficie</th>
                    <td>{{ number_format($parcelle->superficie, 2) }} ha</td>
                </tr>
                <tr>
                    <th>Date de plantation</th>
                    <td>{{ $parcelle->date_plantation->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Statut</th>
                    <td>{{ $parcelle->statut_libelle }}</td>
                </tr>
                <tr>
                    <th>Créée le</th>
                    <td>{{ $parcelle->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 1.5rem;">
            <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">← Retour à la liste</a>
            <a href="{{ route('parcelles.edit', $parcelle) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('parcelles.destroy', $parcelle) }}" method="POST"
                  style="display:inline;" onsubmit="return confirm('Supprimer définitivement cette parcelle ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
@endsection

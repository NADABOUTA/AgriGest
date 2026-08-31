@extends('layouts.app')

@section('title', 'Parcelles')

@section('content')
    <div class="page-header">
        <h1>Liste des parcelles</h1>
        <a class="btn" href="{{ route('parcelles.create') }}">Ajouter une parcelle</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('parcelles.index') }}">
        <input
            type="search"
            name="q"
            value="{{ $q }}"
            placeholder="Rechercher par nom ou culture…"
            aria-label="Rechercher par nom ou culture"
        >

        <select name="statut" aria-label="Filtrer par statut">
            <option value="">Tous</option>
            <option value="en culture" @selected($statut === 'en culture')>en culture</option>
            <option value="récoltée" @selected($statut === 'récoltée')>récoltée</option>
            <option value="en jachère" @selected($statut === 'en jachère')>en jachère</option>
        </select>

        <button type="submit">Rechercher</button>
        <a class="btn" href="{{ route('parcelles.index') }}">Réinitialiser</a>
    </form>

    @if ($parcelles->isEmpty())
        <p class="empty">Aucune parcelle trouvée</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Culture</th>
                    <th>Superficie (ha)</th>
                    <th>Date de plantation</th>
                    <th>Statut</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parcelles as $parcelle)
                    <tr>
                        <td>{{ $parcelle->nom }}</td>
                        <td>{{ $parcelle->culture }}</td>
                        <td>{{ number_format($parcelle->superficie, 2, ',', ' ') }}</td>
                        <td>{{ $parcelle->date_plantation->format('d/m/Y') }}</td>
                        <td>{{ $parcelle->statut }}</td>
                        <td>
                            <form method="POST" action="{{ route('parcelles.destroy', $parcelle) }}" onsubmit="return confirm('Supprimer la parcelle « {{ $parcelle->nom }} » ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
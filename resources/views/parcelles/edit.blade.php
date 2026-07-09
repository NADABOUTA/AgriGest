@extends('layouts.app')

@section('title', 'Modifier la parcelle - ' . $parcelle->nom)

@section('content')
    <div class="card">
        <h2>Modifier la parcelle : {{ $parcelle->nom }}</h2>

        <form action="{{ route('parcelles.update', $parcelle) }}" method="POST">
            @csrf
            @method('PUT')
            @include('parcelles._form')

            <div style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('parcelles.show', $parcelle) }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection

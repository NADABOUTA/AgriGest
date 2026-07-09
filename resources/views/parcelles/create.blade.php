@extends('layouts.app')

@section('title', 'Ajouter une parcelle')

@section('content')
    <div class="card">
        <h2>Ajouter une parcelle</h2>

        <form action="{{ route('parcelles.store') }}" method="POST">
            @csrf
            @include('parcelles._form')

            <div style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection

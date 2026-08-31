@extends('layouts.app')

@section('title', 'Nouvelle parcelle')

@section('content')
    <h1>Ajouter une parcelle</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('parcelles.store') }}">
        @csrf

        <div class="form-group">
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="form-group">
            <label for="culture">Culture</label>
            <input id="culture" type="text" name="culture" value="{{ old('culture') }}" required>
        </div>

        <div class="form-group">
            <label for="superficie">Superficie (ha)</label>
            <input id="superficie" type="number" name="superficie" value="{{ old('superficie') }}" step="0.01" min="0.01" required>
        </div>

        <div class="form-group">
            <label for="date_plantation">Date de plantation</label>
            <input id="date_plantation" type="date" name="date_plantation" value="{{ old('date_plantation') }}" required>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <select id="statut" name="statut" required>
                <option value="en culture" @selected(old('statut') === 'en culture')>en culture</option>
                <option value="récoltée" @selected(old('statut') === 'récoltée')>récoltée</option>
                <option value="en jachère" @selected(old('statut') === 'en jachère')>en jachère</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit">Enregistrer</button>
            <a class="btn btn-secondary" href="{{ route('parcelles.index') }}">Annuler</a>
        </div>
    </form>
@endsection
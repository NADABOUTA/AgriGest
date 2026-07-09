{{-- Partiel de formulaire partagé entre create.blade.php et edit.blade.php --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Merci de corriger les erreurs suivantes :</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label for="nom">Nom de la parcelle</label>
    <input type="text" id="nom" name="nom" value="{{ old('nom', $parcelle->nom ?? '') }}" required>
    @error('nom') <div class="error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="culture">Culture</label>
    <input type="text" id="culture" name="culture" value="{{ old('culture', $parcelle->culture ?? '') }}" required>
    @error('culture') <div class="error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="superficie">Superficie (en hectares)</label>
    <input type="number" step="0.01" min="0.01" id="superficie" name="superficie"
           value="{{ old('superficie', $parcelle->superficie ?? '') }}" required>
    @error('superficie') <div class="error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="date_plantation">Date de plantation</label>
    <input type="date" id="date_plantation" name="date_plantation"
           value="{{ old('date_plantation', isset($parcelle) ? $parcelle->date_plantation->format('Y-m-d') : '') }}" required>
    @error('date_plantation') <div class="error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="statut">Statut</label>
    <select id="statut" name="statut" required>
        @foreach ($statuts as $valeur => $libelle)
            <option value="{{ $valeur }}"
                @selected(old('statut', $parcelle->statut ?? '') === $valeur)>
                {{ $libelle }}
            </option>
        @endforeach
    </select>
    @error('statut') <div class="error">{{ $message }}</div> @enderror
</div>

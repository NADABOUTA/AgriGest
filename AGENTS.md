# AGENTS.md — Projet AgriGest

> Modèle de règles à copier à la **racine** de ton projet AgriGest.
> L'agent lit ce fichier à chaque tâche. Garde-le court (~40 lignes)
> et ajuste chaque ligne à TON projet réel.

## Stack
- Laravel 13.18.1· PHP 8.3.0
- Base de données : MySQL
- Vues : Blade
- Données de test : factories + seeders

## Structure
- Contrôleurs : `app/Http/Controllers`
- Modèles : `app/Models`
- Migrations : `database/migrations`
- Seeders & factories : `database/seeders`, `database/factories`
- Routes : `routes/web.php`
- Vues : `resources/views`

## Le domaine
- Une **parcelle** a : `nom`, `culture`, `superficie`, `date_plantation`, `statut`.
- `statut` prend UNIQUEMENT 3 valeurs : `en culture`, `récoltée`, `en jachère`.
- `superficie` est un nombre (hectares) ; `date_plantation` est une date.

## Conventions
- Valider les formulaires dans un **Form Request**, pas dans le contrôleur.
- Utiliser **Eloquent** ; pas de SQL brut si Eloquent suffit.
- Réutiliser les vues Blade existantes ; ne pas casser la mise en page actuelle.
- Libellés et messages en français.

## Interdits
- Ne pas inventer de méthode Eloquent : vérifier le modèle `Parcelle` existant.
- Ne pas modifier le schéma de la base sans passer par une migration.
- Ne pas ajouter de package sans raison claire.

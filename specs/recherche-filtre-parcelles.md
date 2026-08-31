# Spec — Recherche et filtre des parcelles
 
## Intention
En tant qu'exploitant, je veux chercher une parcelle par son nom ou sa culture
et filtrer la liste par statut, afin de retrouver rapidement les bonnes parcelles
sans faire défiler toute la liste.
 
## Critères d'acceptation
- [ ] La page liste des parcelles affiche un champ de recherche + un menu de statut.
- [ ] La recherche filtre par `nom` OU `culture` (insensible à la casse).
- [ ] Le menu de statut propose : Tous, en culture, récoltée, en jachère.
- [ ] La recherche et le filtre fonctionnent ensemble (les deux en même temps).
- [ ] Les critères restent dans l'URL (ex. `/parcelles?q=maïs&statut=récoltée`)
      et survivent au rechargement de la page.
- [ ] Si aucun résultat : afficher « Aucune parcelle trouvée » (pas d'erreur).
- [ ] Un bouton « Réinitialiser » revient à la liste complète.
## Hors périmètre
- Tri des colonnes, pagination.
- Filtres avancés (superficie, plage de dates), recherche approximative.
## Notes techniques
- On garde la route et le contrôleur existants de la liste des parcelles.
- Lire les paramètres avec `$request->query('q')` et `$request->query('statut')`.
- Construire la requête en Eloquent avec `when()` : n'appliquer un filtre
  que s'il est présent.
- Le formulaire de recherche est en **GET** pour que les critères passent dans l'URL.
 
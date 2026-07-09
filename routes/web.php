<?php

use App\Http\Controllers\ParcelleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Web - Gestion des parcelles
|--------------------------------------------------------------------------
| Route::resource génère automatiquement les 7 routes CRUD standard :
| index, create, store, show, edit, update, destroy.
*/

Route::get('/', function () {
    return redirect()->route('parcelles.index');
});

Route::resource('parcelles', ParcelleController::class);

/*
| Cela équivaut à déclarer manuellement :
|
| GET    /parcelles              -> index    (parcelles.index)
| GET    /parcelles/create       -> create   (parcelles.create)
| POST   /parcelles              -> store    (parcelles.store)
| GET    /parcelles/{parcelle}   -> show     (parcelles.show)
| GET    /parcelles/{parcelle}/edit -> edit  (parcelles.edit)
| PUT    /parcelles/{parcelle}   -> update   (parcelles.update)
| DELETE /parcelles/{parcelle}   -> destroy  (parcelles.destroy)
*/

<?php

use App\Http\Controllers\ParcelleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/parcelles', [ParcelleController::class, 'index'])->name('parcelles.index');
Route::get('/parcelles/create', [ParcelleController::class, 'create'])->name('parcelles.create');
Route::post('/parcelles', [ParcelleController::class, 'store'])->name('parcelles.store');
Route::delete('/parcelles/{parcelle}', [ParcelleController::class, 'destroy'])->name('parcelles.destroy');

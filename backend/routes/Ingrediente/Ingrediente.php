<?php

use App\Http\Mod\Ingrediente\Controllers\IngredienteController;
use Illuminate\Support\Facades\Route;

Route::prefix('ingredientes')->group(function () {
    Route::post('CrearIngrediente', [IngredienteController::class, 'CrearIngrediente']);
    Route::get('ListarIngredientes', [IngredienteController::class, 'ListarIngredientes']);
    Route::put('{id}', [IngredienteController::class, 'EditarIngrediente']);
});


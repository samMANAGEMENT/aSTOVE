<?php

use App\Http\Mod\Plato\Controllers\PlatoController;
use Illuminate\Support\Facades\Route;

Route::prefix('platos')->group(function () {
    Route::post('CrearPlato', [PlatoController::class, 'CrearPlato']);
    Route::get('ListarPlato', [PlatoController::class, 'ListarPlato']);
    Route::put('{id}', [PlatoController::class, 'EditarPlato']);
});


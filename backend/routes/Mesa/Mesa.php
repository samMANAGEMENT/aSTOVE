<?php

use App\Http\Mod\Mesa\Controllers\MesasController;
use Illuminate\Support\Facades\Route;

Route::prefix('mesas')->group(function () {
    Route::post('CrearMesas', [MesasController::class, 'CrearMesas']);
    Route::get('ListarMesas', [MesasController::class, 'ListarMesas']);
    Route::put('{id}', [MesasController::class, 'EditarMesa']);
});


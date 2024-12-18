<?php

use App\Http\Mod\Reserva\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::prefix('plato')->group(function () {
    Route::post('CrearReserva', [ReservaController::class, 'CrearReserva']);
    Route::get('ListarReserva', [ReservaController::class, 'ListarReserva']);
    Route::put('{id}', [ReservaController::class, 'EditarReserva']);
});


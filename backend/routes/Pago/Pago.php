<?php

use App\Http\Mod\Pago\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

Route::prefix('pago')->group(function () {
    Route::post('CrearPago', [PagoController::class, 'CrearPago']);
    Route::get('ListarPago', [PagoController::class, 'ListarPago']);
    Route::put('{id}', [PagoController::class, 'EditarIngrediente']);
});


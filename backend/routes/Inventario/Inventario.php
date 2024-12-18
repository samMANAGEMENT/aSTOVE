<?php

use App\Http\Mod\Inventario\Controllers\InventarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('inventario')->group(function () {
    Route::post('CrearInventario', [InventarioController::class, 'CrearInventario']);
    Route::get('ListarInventario', [InventarioController::class, 'ListarInventario']);
    Route::put('{id}', [InventarioController::class, 'EditarInventario']);
});


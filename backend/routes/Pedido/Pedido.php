<?php

use App\Http\Mod\Pedido\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::prefix('pe')->group(function () {
    Route::post('/pedidos', [PedidoController::class, 'store']);
    Route::post('/pedidos/{pedidoId}/pagar', [PedidoController::class, 'registrarPago']);
    Route::get('/pedidos/{pedidoId}', [PedidoController::class, 'show']);
});




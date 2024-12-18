<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


require __DIR__ . '/Estados/Estados.php';
require __DIR__ . '/Ingrediente/Ingrediente.php';
require __DIR__ . '/Inventario/Inventario.php';
require __DIR__ . '/Mesa/Mesa.php';
require __DIR__ . '/Pago/Pago.php';
require __DIR__ . '/Pedido/Pedido.php';
require __DIR__ . '/Plato/Plato.php';
require __DIR__ . '/Entidad/Entidad.php';

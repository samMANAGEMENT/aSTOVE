<?php

use App\Http\Mod\Estado\Controllers\EstadoController;
use Illuminate\Support\Facades\Route;

Route::prefix('estados')->group(function () {
    Route::get('ListarEstados', [EstadoController::class, 'ListarEstados']);
});


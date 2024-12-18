<?php

use App\Http\Mod\Restaurante\Controllers\RestauranteController;
use Illuminate\Support\Facades\Route;

Route::prefix('entidad')->group(function () {
    Route::get('ListarEntidad', [RestauranteController::class, 'ListarEntidad']);
});


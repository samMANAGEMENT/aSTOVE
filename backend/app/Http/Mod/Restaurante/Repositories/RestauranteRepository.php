<?php

namespace App\Http\Mod\Restaurante\Repositories;

use App\Http\Mod\Restaurante\Models\Restaurante;

class RestauranteRepository{

    public function ListarEntidad()
    {
        return Restaurante::with('mesas', 'platos', 'pedidos', 'inventarios' )->get();
    }
}

<?php

namespace App\Http\Mod\Estado\Repositories;

use App\Http\Mod\Estado\Models\Estado;

class EstadoRepository{

    public function ListarEstados()
    {
        return Estado::select( 'id', 'nombre', 'tipo')->get();
    }
}

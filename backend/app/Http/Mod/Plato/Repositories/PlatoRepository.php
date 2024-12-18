<?php

namespace App\Http\Mod\Plato\Repositories;

use App\Http\Mod\Plato\Models\Plato;

class PlatoRepository{
    public function CrearPlato(array $data)
    { 
        return Plato::create($data);
    }

    public function ListarPlato()
    {
        return Plato::with( 'restaurante:id,nombre,descripcion')->get();
    }

    public function EditarPlato($id, array $data)
{
    $mesa = Plato::findOrFail($id);
    $mesa->update($data);

    return $mesa;
}
}

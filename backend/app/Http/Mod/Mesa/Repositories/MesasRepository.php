<?php

namespace App\Http\Mod\Mesa\Repositories;

use App\Http\Mod\Mesa\Models\Mesa;

class MesasRepository{
    public function CrearMesas(array $data)
    { 
        return Mesa::create($data);
    }

    public function ListarMesas()
    {
        return Mesa::with('estado:id,nombre')->paginate(20);
    }

    public function EditarMesa($id, array $data)
{
    $mesa = Mesa::findOrFail($id);
    $mesa->update($data);

    return $mesa;
}
}

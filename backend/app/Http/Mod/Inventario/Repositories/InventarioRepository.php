<?php

namespace App\Http\Mod\Inventario\Repositories;

use App\Http\Mod\Inventario\Models\Inventario;

class InventarioRepository{

    public function CrearInventario(array $data)
    { 
        return Inventario::create($data);
    }

    public function ListarInventario()
    {
        return Inventario::with(['restaurante_id:id,nombre', 'ingrediente_id:nombre,unidad'])
            ->get();
    }

    public function EditarInventario($id, array $data)
    {
        $mesa = Inventario::findOrFail($id);
        $mesa->update($data);
    
        return $mesa;
    }
}

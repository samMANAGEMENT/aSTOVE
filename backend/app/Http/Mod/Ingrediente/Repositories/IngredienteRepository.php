<?php

namespace App\Http\Mod\Ingrediente\Repositories;

use App\Http\Mod\Ingrediente\Models\Ingrediente;

class IngredienteRepository{

    public function CrearIngrediente(array $data)
    { 
        return Ingrediente::create($data);
    }

    public function ListarIngredientes()
    {
        return Ingrediente::select('id', 'nombre', 'unidad')->get();
    }

    public function EditarIngrediente($id, array $data)
    {
        $mesa = Ingrediente::findOrFail($id);
        $mesa->update($data);
    
        return $mesa;
    }
}

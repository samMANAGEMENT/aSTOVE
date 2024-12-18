<?php

namespace App\Http\Mod\Pago\Repositories;

use App\Http\Mod\Pago\Models\Pago;

class PagoRepository{
    public function CrearPago(array $data)
    { 
        return Pago::create($data);
    }

    public function ListarPago()
    {
        return Pago::with(['pedido:restaurante_id,mesa_id', 'estado'])
            ->get();
    }

    public function EditarPago($id, array $data)
{
    $mesa = Pago::findOrFail($id);
    $mesa->update($data);

    return $mesa;
}
}

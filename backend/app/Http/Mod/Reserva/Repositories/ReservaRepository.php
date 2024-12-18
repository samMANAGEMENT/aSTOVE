<?php

namespace App\Http\Mod\Reserva\Repositories;

use App\Http\Mod\Reserva\Models\Reserva;

class ReservaRepository
{
    public function CrearReserva(array $data)
    {
        return Reserva::create($data);
    }

    public function ListarReserva()
    {
        return Reserva::with('mesa', 'usuario')->get();
    }

    public function EditarReserva($id, array $data)
    {
        $mesa = Reserva::findOrFail($id);
        $mesa->update($data);

        return $mesa;
    }
}

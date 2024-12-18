<?php

namespace App\Http\Mod\Reserva\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Mod\Reserva\Repositories\ReservaRepository;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function __construct( private ReservaRepository $reservaRepository)
    {
    }

    public function CrearReserva(Request $request)
    {
        $validatedData = $request->validate([
            'mesa_id' => 'require',
            'usuario_id' => 'require',
            'fecha_hora' => 'require',
            'cantidad_personas' => 'require'
        ]);

        $cat = $this->reservaRepository->CrearReserva($validatedData);

        return response() ->json([
            'message' => 'Eres el mejor creaste un plato!',
            'description' => $cat,
        ], 201);
    }

    public function ListarReserva(Request $request)
    {
        try {
            $listar = $this->reservaRepository->ListarReserva();
            return response()->json([
                'message' => 'Datos Listados', 
                'data' => $listar
            ], 201);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarReserva(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mesa_id' => 'required',
            'usuario_id' => 'required',
            'fecha_hora' => 'required',
            'cantidad_personas' => 'required',
        ]);
        try {
            $reservaActualizada = $this->reservaRepository->EditarReserva($id, $validatedData);

            return response()->json([
                'message' => 'Reserva actualizado con éxito',
                'data' => $reservaActualizada,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar el reserva',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

}

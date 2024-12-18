<?php

namespace App\Http\Mod\Plato\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Mod\Plato\Repositories\PlatoRepository;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function __construct(private PlatoRepository $platoRepository)
    {
    }

    public function CrearPlato(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'require',
            'descripcion' => 'require',
            'precio' => 'require',
            'restaurante_id' => 'require'
        ]);

        $cat = $this->platoRepository->CrearPlato($validatedData);

        return response() ->json([
            'message' => 'Eres el mejor creaste un plato!',
            'description' => $cat,
        ], 201);
    }

    public function ListarPlato(Request $request)
    {
        try {
            $listar = $this->platoRepository->ListarPlato();
            return response()->json([
                'message' => 'Datos Listados', 
                'data' => $listar
            ], 201);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarPlato(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'restaurante_id' => 'required',
        ]);
        try {
            $mesaActualizada = $this->platoRepository->EditarPlato($id, $validatedData);

            return response()->json([
                'message' => 'Plato actualizado con éxito',
                'data' => $mesaActualizada,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar el plato',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}

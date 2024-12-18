<?php

namespace App\Http\Mod\Ingrediente\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mod\Ingrediente\Repositories\IngredienteRepository;

class IngredienteController extends Controller
{
    public function __construct(private IngredienteRepository $ingredienteRepository)
    {
    }

    public function CrearIngrediente(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'unidad' => 'required',
        ]);

        $cat = $this->ingredienteRepository->CrearIngrediente($validatedData);

        return response()->json([
            'message' => 'Ingrediente creado con éxito',
            'description' => $cat,
        ], 201);
    }

    public function ListarIngredientes(Request $request)
    {
        try {
            $listar = $this->ingredienteRepository->ListarIngredientes();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarIngrediente(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'unidad' => 'required',
        ]);
        try {
            $ingredienteActaulizado = $this->ingredienteRepository->EditarIngrediente($id, $validatedData);
            return response()->json([
                'message' => 'Ingrediente actualizado con éxito',
                'data' => $ingredienteActaulizado,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar el ingrediente',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}

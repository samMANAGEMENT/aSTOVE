<?php

namespace App\Http\Mod\Inventario\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mod\Inventario\Repositories\InventarioRepository;

class InventarioController extends Controller
{
    public function __construct(private InventarioRepository $inventarioRepository)
    {
    }

    public function CrearInventario(Request $request)
    {
        $validatedData = $request->validate([
            'restaurante_id' => 'required',
            'ingrediente_id' => 'required',
            'cantidad' => 'required'
        ]);

        $cat = $this->inventarioRepository->CrearInventario($validatedData);

        return response()->json([
            'message' => 'OK',
            'description' => $cat,
        ], 201);
    }

    public function ListarInventario(Request $request)
    {
        try {
            $listar = $this->inventarioRepository->ListarInventario();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}

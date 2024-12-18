<?php

namespace App\Http\Mod\Pago\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mod\Pago\Repositories\PagoRepository;

class PagoController extends Controller
{
    public function __construct(private PagoRepository $pagoRepository)
    {
    }

    public function CrearPago(Request $request)
    {
        $validatedData = $request->validate([
            'restaurante_id' => 'required',
            'ingrediente_id' => 'required',
            'cantidad' => 'required'
        ]);

        $cat = $this->pagoRepository->CrearPago($validatedData);

        return response()->json([
            'message' => 'OK',
            'description' => $cat,
        ], 201);
    }

    public function ListarPago(Request $request)
    {
        try {
            $listar = $this->pagoRepository->ListarPago();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}

<?php

namespace App\Http\Mod\Estado\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mod\Estado\Repositories\EstadoRepository;

class EstadoController extends Controller
{
    public function __construct(private EstadoRepository $estadoRepository)
    {
    }

    public function ListarEstados(Request $request)
    {
        try {
            $listar = $this->estadoRepository->ListarEstados();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}

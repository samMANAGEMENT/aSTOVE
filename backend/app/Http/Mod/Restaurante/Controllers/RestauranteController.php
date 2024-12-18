<?php

namespace App\Http\Mod\Restaurante\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mod\Restaurante\Repositories\RestauranteRepository;

class RestauranteController extends Controller
{
    public function __construct(private RestauranteRepository $restauranteRepository)
    {
    }

    public function ListarEntidad(Request $request)
    {
        try {
            $listar = $this->restauranteRepository->ListarEntidad();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}

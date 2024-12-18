<?php

namespace App\Http\Mod\Pedido\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Mod\Pedido\Repositories\PedidoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    protected $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }

    // Crear nuevo pedido
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'restaurante_id' => 'required|exists:restaurantes,id',
            'mesa_id' => 'required|exists:mesas,id',
            'platos' => 'required|array',
            'platos.*.plato_id' => 'required|exists:platos,id',
            'platos.*.cantidad' => 'required|integer|min:1',
            'platos.*.precio' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Crear pedido
            $pedido = $this->pedidoRepository->crearPedido($request->only(['restaurante_id', 'mesa_id']));
            
            // Agregar platos
            $pedido = $this->pedidoRepository->agregarPlatosAPedido($pedido, $request->input('platos'));

            return response()->json([
                'message' => 'Pedido creado exitosamente',
                'pedido' => $pedido
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear pedido',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Registrar pago de pedido
    public function registrarPago(Request $request, $pedidoId) {
        $validator = Validator::make($request->all(), [
            'metodo_pago' => 'required|in:EFECTIVO,TARJETA,TRANSFERENCIA'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $pedido = $this->pedidoRepository->obtenerDetallesPedido($pedidoId);
            
            $pago = $this->pedidoRepository->registrarPago($pedido, $request->input('metodo_pago'));

            return response()->json([
                'message' => 'Pago registrado exitosamente',
                'pago' => $pago
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al registrar pago',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Obtener detalles de pedido
    public function show($pedidoId) {
        try {
            $pedido = $this->pedidoRepository->obtenerDetallesPedido($pedidoId);

            return response()->json($pedido);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Pedido no encontrado',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
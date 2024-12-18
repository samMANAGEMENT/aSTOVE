<?php

namespace App\Http\Mod\Pedido\Repositories;

use App\Http\Mod\Pedido\Models\Pedido;
use App\Http\Mod\PedidoPlato\Models\PedidoPlato;
use App\Http\Mod\Pago\Models\Pago;
use App\Http\Mod\Mesa\Models\Mesa;
use App\Http\Mod\Estado\Models\Estado;
use Illuminate\Support\Facades\DB;

class PedidoRepository {
    
    // Crear pedido base
    public function crearPedido($datos) {
        return Pedido::create([
            'restaurante_id' => $datos['restaurante_id'],
            'mesa_id' => $datos['mesa_id'],
            'estado_id' => Estado::where('nombre', 'PENDIENTE')->first()->id,
            'monto_total' => 0
        ]);
    }

    // Agregar platos al pedido
    public function agregarPlatosAPedido($pedido, $platos) {
        $totalPedido = 0;

        foreach ($platos as $plato) {
            $subtotal = $plato['precio'] * $plato['cantidad'];
            
            PedidoPlato::create([
                'pedido_id' => $pedido->id,
                'plato_id' => $plato['plato_id'],
                'cantidad' => $plato['cantidad'],
                'subtotal' => $subtotal
            ]);

            $totalPedido += $subtotal;
        }

        // Actualizar total en pedido
        $pedido->update(['monto_total' => $totalPedido]);

        return $pedido;
    }

    // Registrar pago y finalizar pedido
    public function registrarPago($pedido, $metodoPago) {
        return DB::transaction(function () use ($pedido, $metodoPago) {
            // Registrar pago
            $pago = Pago::create([
                'pedido_id' => $pedido->id,
                'monto' => $pedido->monto_total,
                'estado_id' => Estado::where('nombre', 'PAGADO')->first()->id,
                'metodo_pago' => $metodoPago
            ]);

            // Actualizar estado del pedido
            $pedido->update([
                'estado_id' => Estado::where('nombre', 'COMPLETADO')->first()->id
            ]);

            // Liberar mesa
            $mesa = Mesa::find($pedido->mesa_id);
            $mesa->update([
                'estado_id' => Estado::where('nombre', 'DISPONIBLE')->first()->id
            ]);

            return $pago;
        });
    }

    // Obtener detalles de un pedido
    public function obtenerDetallesPedido($pedidoId) {
        return Pedido::with(['pedidoPlatos', 'restaurante', 'mesa', 'estado'])
            ->findOrFail($pedidoId);
    }
}
<?php

namespace App\Http\Mod\PedidoPlato\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Pedido\Models\Pedido;
use App\Http\Mod\Plato\Models\Plato;

class PedidoPlato extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id', 'plato_id', 'cantidad', 'subtotal'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }
}

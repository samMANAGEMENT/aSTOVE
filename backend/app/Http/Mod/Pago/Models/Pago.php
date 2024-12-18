<?php

namespace App\Http\Mod\Pago\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Pedido\Models\Pedido;
use App\Http\Mod\Estado\Models\Estado;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id', 'monto', 'estado_id', 'metodo_pago'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}

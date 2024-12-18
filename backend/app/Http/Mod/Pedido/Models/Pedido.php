<?php

namespace App\Http\Mod\Pedido\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Mesa\Models\Mesa;
use App\Http\Mod\Restaurante\Models\Restaurante;
use App\Http\Mod\Estado\Models\Estado;
use App\Http\Mod\PedidoPlato\Models\PedidoPlato;
use App\Http\Mod\Pago\Models\Pago;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['restaurante_id', 'mesa_id', 'estado_id', 'monto_total'];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function pedidoPlatos()
    {
        return $this->hasMany(PedidoPlato::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}

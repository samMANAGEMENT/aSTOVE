<?php

namespace App\Http\Mod\Estado\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Mesa\Models\Mesa;
use App\Http\Mod\Pedido\Models\Pedido;
use App\Http\Mod\Pago\Models\Pago;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo'];

    public function mesas()
    {
        return $this->hasMany(Mesa::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
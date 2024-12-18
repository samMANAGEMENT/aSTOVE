<?php

namespace App\Http\Mod\Restaurante\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Mod\Mesa\Models\Mesa;
use App\Http\Mod\Plato\Models\Plato;
use App\Http\Mod\Pedido\Models\Pedido;
use App\Http\Mod\Inventario\Models\Inventario;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'descripcion', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function mesas()
    {
        return $this->hasMany(Mesa::class);
    }

    public function platos()
    {
        return $this->hasMany(Plato::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }
}

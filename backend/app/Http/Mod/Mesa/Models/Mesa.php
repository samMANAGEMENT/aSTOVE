<?php

namespace App\Http\Mod\Mesa\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Restaurante\Models\Restaurante;
use App\Http\Mod\Estado\Models\Estado;
use App\Http\Mod\Pedido\Models\Pedido;
use App\Http\Mod\Reserva\Models\Reserva;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'capacidad', 'restaurante_id', 'estado_id'];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

<?php

namespace App\Http\Mod\Reserva\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Mesa\Models\Mesa;
use App\Models\User;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['mesa_id', 'usuario_id', 'fecha_hora', 'cantidad_personas'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}

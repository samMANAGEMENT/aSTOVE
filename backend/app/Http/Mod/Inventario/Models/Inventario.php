<?php

namespace App\Http\Mod\Inventario\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Restaurante\Models\Restaurante;
use App\Http\Mod\Ingrediente\Models\Ingrediente;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurante_id', 
        'ingrediente_id', 
        'cantidad'
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'restaurante_id');
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'ingrediente_id');
    }
}

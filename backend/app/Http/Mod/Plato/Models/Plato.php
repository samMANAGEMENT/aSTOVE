<?php

namespace App\Http\Mod\Plato\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Restaurante\Models\Restaurante;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'precio', 'restaurante_id'];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}

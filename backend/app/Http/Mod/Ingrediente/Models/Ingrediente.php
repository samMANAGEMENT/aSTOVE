<?php

namespace App\Http\Mod\Ingrediente\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Mod\Inventario\Models\Inventario;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes';

    protected $fillable = ['nombre', 'unidad'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }
}

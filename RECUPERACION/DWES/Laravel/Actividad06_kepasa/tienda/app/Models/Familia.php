<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    // Definir la tabla si el nombre no es el pluralizado automáticamente por Laravel
    protected $table = 'familias';

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = ['nombre'];

    // Relación con la tabla 'productos'
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}


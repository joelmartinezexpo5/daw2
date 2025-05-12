<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    // Definir la tabla si el nombre no es el pluralizado automáticamente por Laravel
    protected $table = 'imagenes';

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = ['producto_id', 'archivo'];

    // Relación con la tabla 'productos'
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

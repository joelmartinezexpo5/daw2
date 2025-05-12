<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Imagen;


class Producto extends Model
{
    use HasFactory;

    // Definir la tabla si el nombre no es el pluralizado automáticamente por Laravel
    protected $table = 'productos';

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = ['nombre', 'descripcion', 'familia_id'];

    // Relación con la tabla 'familias'
    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    // Relación con la tabla 'imagenes'
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}

